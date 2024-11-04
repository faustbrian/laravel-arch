<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Statement\Laravel;

use BaseCodeOy\Arch\Contract\StatementInterface;
use BaseCodeOy\Arch\Renderer\FileRenderer;

final readonly class SessionStatement implements StatementInterface
{
    public function __construct(
        private string $operation,
        private string $reference,
    ) {}

    public static function from(array $context): StatementInterface
    {
        return new self(
            operation: $context['method'],
            reference: $context['statement'],
        );
    }

    public function code(array $context = []): string
    {
        return \sprintf(
            '$request->session()->%s(\'%s\', $%s);',
            $this->operation,
            $this->reference,
            \str_replace('.', '->', $this->reference),
        );
    }

    public function test(array $context = []): string
    {
        return FileRenderer::render('laravel/session/test/session', [
            'key' => $this->reference,
            'value' => \str_replace('.', '->', $this->reference),
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
