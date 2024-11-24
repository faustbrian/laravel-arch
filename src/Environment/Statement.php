<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Environment;

final class Statement
{
    public function __construct(
        private readonly array $methods,
        private readonly string $fullyQualifiedClassName,
    ) {}

    public function methods(): array
    {
        return $this->methods;
    }

    public function fullyQualifiedClassName(): string
    {
        return $this->fullyQualifiedClassName;
    }
}
