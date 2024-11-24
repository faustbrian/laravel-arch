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

final readonly class RouteRedirectStatement implements StatementInterface
{
    public function __construct(
        private string $name,
        private ?array $parameters = [],
    ) {}

    public static function from(array $context): StatementInterface
    {
        $statement = Str::parseStatement($context['statement']);

        if (\array_key_exists(1, $statement)) {
            throw new WrongStatementHandlerException();
        }

        return new self(
            name: $statement[0],
            parameters: Arr::mapValueToProperty($statement['with'] ?? []),
        );
    }

    public function code(array $context = []): string
    {
        $hasParameters = \count($this->parameters) > 0;

        return \sprintf(
            $hasParameters ? "return Redirect::route('%s', %s);" : "return Redirect::route('%s');",
            $this->name,
            $hasParameters ? Arr::propertiesToArray($this->parameters) : '',
        );
    }

    public function test(array $context = []): string
    {
        return FileRenderer::render('laravel/redirect/test/route', [
            'name' => $this->name,
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
