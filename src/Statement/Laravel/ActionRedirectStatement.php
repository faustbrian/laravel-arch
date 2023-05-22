<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Statement\Laravel;

use BombenProdukt\Arch\Contract\StatementInterface;
use BombenProdukt\Arch\Exception\WrongStatementHandlerException;
use BombenProdukt\Arch\Renderer\FileRenderer;
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

        if (isset($statement[1])) {
            return new self(
                controller: '\\'.Str::controllerNamespace($statement[0]),
                method: $statement[1],
                parameters: Arr::mapValueToProperty($statement['with'] ?? []),
            );
        }

        throw new WrongStatementHandlerException();
    }

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

    public function test(array $context = []): string
    {
        return FileRenderer::render('laravel/redirect/test/action', [
            'controller' => $this->controller,
            'method' => $this->method,
        ]);
    }

    public function imports(array $context = []): array
    {
        return [
            Redirect::class,
        ];
    }

    public function traits(array $context = []): array
    {
        return [];
    }
}
