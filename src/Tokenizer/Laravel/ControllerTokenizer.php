<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\Controller;
use BaseCodeOy\Arch\Model\ControllerMethod;
use BaseCodeOy\Arch\Model\FormRequest;
use BaseCodeOy\Arch\Model\Policy;
use BaseCodeOy\Arch\Model\View;
use BaseCodeOy\Arch\Renderer\StringRenderer;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

final readonly class ControllerTokenizer extends AbstractTokenizer
{
    private readonly StatementTokenizer $statementTokenizer;

    public function __construct()
    {
        $this->statementTokenizer = new StatementTokenizer();
    }

    #[\Override()]
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['controllers'])) {
            return [];
        }

        $result = [
            'controllers' => [],
            'policies' => [],
            'views' => [],
        ];

        foreach ($tokens['controllers'] as $group => $groupControllers) {
            foreach ($groupControllers as $key => $value) {
                [$name, $parent, $model] = $this->determineNameAndModels($key);

                $newController = new Controller(
                    name: $name,
                    group: $group,
                    model: $model,
                    parent: $parent,
                    authorizeResource: Arr::get($value, 'authorizeResource', true),
                    creatable: Arr::get($value, 'creatable', false),
                    invokable: Arr::get($value, 'invokable', false),
                    plain: Arr::get($value, 'plain', false),
                    resource: Arr::get($value, 'resource', false),
                    singleton: Arr::get($value, 'singleton', false),
                );

                if ($newController->resource() && empty($value['methods'])) {
                    $value['methods'] = $this->generateResourceTokens($group, $newController);
                }

                if (\array_key_exists('methods', $value) && \is_array($value['methods'])) {
                    foreach ($value['methods'] as $methodName => $methodStatements) {
                        $statements = [];

                        if (\is_string($methodName)) {
                            $statements = $this->statementTokenizer->tokenize($methodStatements);
                        }

                        if (\is_numeric($methodName)) {
                            $controllerMethod = new ControllerMethod(
                                verb: $this->getVerb($methodStatements),
                                name: $methodStatements,
                                statements: $statements,
                            );
                        } else {
                            $controllerMethod = new ControllerMethod(
                                verb: $this->getVerb($methodName),
                                name: $methodName,
                                statements: $statements,
                            );
                        }

                        $newController->addMethod($controllerMethod);

                        if ($newController->group() === 'web') {
                            $result['views'][] = new View($newController->nameWithSuffixForRoute().'.'.$controllerMethod->name());
                        }
                    }
                }

                if (Arr::get($value, 'requests', true)) {
                    $result['formRequests'][] = new FormRequest(
                        name: 'Store'.$newController->name(),
                    );
                    $result['formRequests'][] = new FormRequest(
                        name: 'Update'.$newController->name(),
                    );
                }

                if (Arr::get($value, 'policy', true)) {
                    $result['policies'][] = new Policy($newController->name());
                }

                $result['controllers'][] = $newController;
            }
        }

        return $result;
    }

    private function getVerb(string $method): string
    {
        return match ($method) {
            'index' => 'get',
            'create' => 'get',
            'store' => 'post',
            'show' => 'get',
            'edit' => 'get',
            'update' => 'put',
            'destroy' => 'delete',
        };
    }

    private function generateResourceTokens(string $group, Controller $controller): array
    {
        $methods = $this->methodsForResource($controller->group());

        $resourceTokens = [];

        foreach ($this->resourceTokens($group) as $method => $statements) {
            if (!\in_array($method, $methods, true)) {
                continue;
            }

            foreach ($statements as $statement) {
                $resourceTokens[\str_replace('api.', '', $method)][][\array_key_first($statement)] = StringRenderer::render(
                    head($statement),
                    [
                        'singular' => Str::camel($controller->nestedModel()),
                        'plural' => Str::camel(Str::plural($controller->nestedModel())),
                    ],
                );
            }
        }

        return $resourceTokens;
    }

    private function resourceTokens(string $group): array
    {
        return match ($group) {
            'api' => [
                'index' => [
                    ['query' => 'all:{{ plural }}'],
                    ['resource' => 'collection:{{ plural }}'],
                ],
                'store' => [
                    ['validate' => '{{ singular }}'],
                    ['save' => '{{ singular }}'],
                    ['resource' => '{{ singular }}'],
                ],
                'show' => [
                    ['resource' => '{{ singular }}'],
                ],
                'update' => [
                    ['validate' => '{{ singular }}'],
                    ['update' => '{{ singular }}'],
                    ['resource' => '{{ singular }}'],
                ],
                'destroy' => [
                    ['delete' => '{{ singular }}'],
                    ['respond' => 204],
                ],
            ],
            'web' => [
                'index' => [
                    ['query' => 'all:{{ plural }}'],
                    ['view' => '{{ singular }}.index with:{{ plural }}'],
                ],
                'create' => [
                    ['view' => '{{ singular }}.create'],
                ],
                'store' => [
                    ['validate' => '{{ singular }}'],
                    ['save' => '{{ singular }}'],
                    ['flash' => '{{ singular }}.id'],
                    ['redirect' => '{{ singular }}.index'],
                ],
                'show' => [
                    ['view' => '{{ singular }}.show with:{{ singular }}'],
                ],
                'edit' => [
                    ['view' => '{{ singular }}.edit with:{{ singular }}'],
                ],
                'update' => [
                    ['validate' => '{{ singular }}'],
                    ['update' => '{{ singular }}'],
                    ['flash' => '{{ singular }}.id'],
                    ['redirect' => '{{ plural }}.index'],
                ],
                'destroy' => [
                    ['delete' => '{{ singular }}'],
                    ['redirect' => '{{ plural }}.index'],
                ],
            ],
            default => throw new \InvalidArgumentException('Invalid resource group'),
        };
    }

    private function methodsForResource(string $type): array
    {
        if ($type === 'api') {
            return ['api.index', 'api.store', 'api.show', 'api.update', 'api.destroy'];
        }

        if ($type === 'web') {
            return ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'];
        }

        return \array_map('trim', \explode(',', \mb_strtolower($type)));
    }

    private function determineNameAndModels(string $name): array
    {
        $controllerName = \str_contains($name, '/') ? \str_replace('/', '', $name) : Str::className($name);

        $models = \explode('/', $name);

        if (\count($models) > 1) {
            return [$controllerName, $models[0], $models[1]];
        }

        return [$controllerName, null, $models[0]];
    }
}
