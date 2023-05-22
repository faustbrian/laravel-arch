<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Statement\Laravel;

use BombenProdukt\Arch\Contract\StatementInterface;
use BombenProdukt\Arch\Renderer\FileRenderer;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

final readonly class ViewStatement implements StatementInterface
{
    public function __construct(
        private string $name,
        private array $parameters = [],
    ) {}

    public static function from(array $context): StatementInterface
    {
        $statement = Str::parseStatement($context['statement']);

        return new self(
            name: $statement[0],
            parameters: Arr::mapValueToProperty($statement['with'] ?? []),
        );
    }

    public function code(array $context = []): string
    {
        return \sprintf(
            \count($this->parameters) > 0 ? "return view('%s', %s);" : "return view('%s');",
            $this->name,
            $this->parameters ? Arr::propertiesToArray($this->parameters) : '',
        );
    }

    public function test(array $context = []): string
    {
        return FileRenderer::render('laravel/view/test/view', [
            'name' => $this->name,
        ]);
    }

    public function imports(array $context = []): array
    {
        return [
            View::class,
        ];
    }

    public function traits(array $context = []): array
    {
        return [];
    }
}
