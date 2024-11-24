<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Model\Nova;

use BaseCodeOy\Arch\Model\AbstractData;

final class Resource extends AbstractData
{
    public function __construct(
        private readonly string $name,
    ) {
        $this->normalizeNamespace($name);
    }

    public function name(): string
    {
        return $this->basename($this->name);
    }

    protected function accessor(): string
    {
        return 'nova.resources';
    }
}
