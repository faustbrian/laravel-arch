<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Statement\Inertia;

use BombenProdukt\Arch\Contract\StatementInterface;
use BombenProdukt\Arch\Renderer\FileRenderer;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

final readonly class RenderStatement implements StatementInterface
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
            \count($this->parameters) > 0 ? "return Inertia::render('%s', %s);" : "return Inertia::render('%s');",
            $this->name,
            $this->parameters ? Arr::propertiesToArray($this->parameters) : '',
        );
    }

    public function test(array $context = []): string
    {
        return FileRenderer::render('inertia/test/render', [
            'name' => $this->name,
        ]);
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
