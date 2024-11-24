<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Model;

final class Property
{
    public function __construct(
        private readonly string $name,
        private readonly string $type = 'string',
        private readonly string $visibility = 'public',
        private readonly bool $isReadonly = false,
        private readonly bool $isNullable = false,
        private readonly mixed $defaultValue = null,
    ) {}

    public function name(): string
    {
        return $this->name;
    }

    public function type(): string
    {
        return $this->type;
    }

    public function visibility(): string
    {
        return $this->visibility;
    }

    public function isReadonly(): bool
    {
        return $this->isReadonly;
    }

    public function isNullable(): bool
    {
        return $this->isNullable;
    }

    public function defaultValue(): mixed
    {
        return $this->defaultValue;
    }
}
