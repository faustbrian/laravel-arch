<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Environment;

final class Generator
{
    public function __construct(
        private readonly string $accessor,
        private readonly string $fullyQualifiedClassName,
        private readonly string $namespace,
        private readonly string $directory,
    ) {}

    public function accessor(): string
    {
        return $this->accessor;
    }

    public function fullyQualifiedClassName(): string
    {
        return $this->fullyQualifiedClassName;
    }

    public function namespace(): string
    {
        return $this->namespace;
    }

    public function directory(): string
    {
        return $this->directory;
    }
}
