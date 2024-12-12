<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Model;

final readonly class Property
{
    public function __construct(
        private string $name,
        private string $type = 'string',
        private string $visibility = 'public',
        private bool $isReadonly = false,
        private bool $isNullable = false,
        private mixed $defaultValue = null,
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
