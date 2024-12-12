<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Statement\Laravel;

use BaseCodeOy\Arch\Contract\StatementInterface;
use BaseCodeOy\Arch\Exception\WrongStatementHandlerException;
use BaseCodeOy\Arch\Renderer\FileRenderer;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

final readonly class ActionRedirectStatement implements StatementInterface
{
    public function __construct(
        private string $controller,
        private string $method,
        private ?array $parameters = [],
    ) {}

    public static function from(array $context): StatementInterface
    {
        $statement = Str::parseStatement($context['statement']);

        if (\array_key_exists(1, $statement)) {
            return new self(
                controller: '\\'.Str::controllerNamespace($statement[0]),
                method: $statement[1],
                parameters: Arr::mapValueToProperty($statement['with'] ?? []),
            );
        }

        throw new WrongStatementHandlerException();
    }

    #[\Override()]
    public function code(array $context = []): string
    {
        $hasParameters = \count($this->parameters) > 0;

        return \sprintf(
            $hasParameters ? "return Redirect::action([%s::class, '%s'], %s);" : "return Redirect::action([%s::class, '%s']);",
            $this->controller,
            $this->method,
            $hasParameters ? Arr::propertiesToArray($this->parameters) : '',
        );
    }

    #[\Override()]
    public function test(array $context = []): string
    {
        return FileRenderer::render('laravel/redirect/test/action', [
            'controller' => $this->controller,
            'method' => $this->method,
        ]);
    }

    #[\Override()]
    public function imports(array $context = []): array
    {
        return [
            Redirect::class,
        ];
    }

    #[\Override()]
    public function traits(array $context = []): array
    {
        return [];
    }
}
