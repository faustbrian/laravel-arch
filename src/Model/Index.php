<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Model;

final class Index
{
    public function __construct(
        private readonly string $type,
        private readonly array $columns = [],
    ) {}

    public function type()
    {
        return $this->type;
    }

    public function columns()
    {
        return $this->columns;
    }
}
