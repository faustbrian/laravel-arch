<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Model;

final readonly class Column
{
    public function __construct(
        private string $name,
        private string $type = 'string',
        private array $modifiers = [],
        private array $attributes = [],
    ) {}

    public function name(): string
    {
        return $this->name;
    }

    public function type(): string
    {
        return $this->type;
    }

    public function attributes(): array
    {
        return $this->attributes;
    }

    public function modifiers(): array
    {
        return $this->modifiers;
    }

    public function foreignKey(): ?string
    {
        return collect($this->modifiers)
            ->filter(fn ($modifier): bool => (\is_array($modifier) && \key($modifier) === 'foreign') || $modifier === 'foreign')
            ->flatten()
            ->first();
    }

    public function isNullable(): bool
    {
        return \in_array('nullable', $this->modifiers, true);
    }

    public function defaultValue(): mixed
    {
        return collect($this->modifiers)
            ->collapse()
            ->first(fn ($value, $key): false => $key === 0);
    }
}
