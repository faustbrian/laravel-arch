<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Statement\Laravel;

use BaseCodeOy\Arch\Contract\StatementInterface;

final readonly class ValidateStatement implements StatementInterface
{
    public function __construct(
        private array $rules,
    ) {
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
