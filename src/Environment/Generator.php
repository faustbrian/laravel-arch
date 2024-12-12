<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Environment;

final readonly class Generator
{
    public function __construct(
        private string $accessor,
        private string $fullyQualifiedClassName,
        private string $namespace,
        private string $directory,
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
