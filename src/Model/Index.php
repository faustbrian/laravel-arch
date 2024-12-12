<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Model;

final readonly class Index
{
    public function __construct(
        private string $type,
        private array $columns = [],
    ) {}

    public function type(): string
    {
        return $this->type;
    }

    public function columns(): array
    {
        return $this->columns;
    }
}
