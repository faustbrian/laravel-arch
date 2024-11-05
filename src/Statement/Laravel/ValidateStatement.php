<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Statement\Laravel;

use BaseCodeOy\Arch\Contract\StatementInterface;

final readonly class ValidateStatement implements StatementInterface
{
    public function __construct(private array $rules)
    {
        //
    }

    public static function from(array $context): StatementInterface
    {
        return new self(
            rules: \explode(',', $context['statement']),
        );
    }

    public function code(array $context = []): string
    {
        return '';
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
