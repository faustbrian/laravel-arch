<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Model;

final class Migration extends AbstractData
{
    public function __construct(
        private readonly string $name,
        private readonly array $columns,
        private readonly array $indexes,
    ) {}

    #[\Override()]
    public function name(): string
    {
        return $this->name;
    }

    public function columns(): array
    {
        return $this->columns;
    }

    public function indexes(): array
    {
        return $this->indexes;
    }
}
