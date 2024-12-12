<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Environment;

final readonly class Tokenizer
{
    public function __construct(
        private string $fullyQualifiedClassName,
        private array $configuration,
    ) {}

    public function fullyQualifiedClassName(): string
    {
        return $this->fullyQualifiedClassName;
    }

    public function configuration(): array
    {
        return $this->configuration;
    }
}
