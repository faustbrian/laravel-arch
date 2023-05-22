<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Statement\Laravel;

use BombenProdukt\Arch\Contract\StatementInterface;
use BombenProdukt\Arch\Renderer\FileRenderer;
use Illuminate\Support\Str;

final readonly class AuthorizeStatement implements StatementInterface
{
    public function __construct(public readonly string $method)
    {
        //
    }

    public static function from(array $context): StatementInterface
    {
        return new self($context['method']);
    }

    public function code(array $context = []): string
    {
        return FileRenderer::render('laravel/controller/authorize/'.$this->method, [
            'method' => $context['method'],
            'abilities' => \in_array($context['method'], ['show', 'edit', 'update', 'destroy'], true)
                ? '$'.Str::camel($context['model'])
                : Str::studly($context['model']).'::class',
        ]);
    }

    public function test(array $context = []): string
    {
        return '';
    }

    public function imports(array $context = []): array
    {
        return [];
    }

    public function traits(array $context = []): array
    {
        return [];
    }
}
