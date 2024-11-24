<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Contract;

interface StatementInterface
{
    public function code(array $context = []): string;

    public function test(array $context = []): string;

    public function imports(array $context = []): array;

    public function traits(array $context = []): array;
}
