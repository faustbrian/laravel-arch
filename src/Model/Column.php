<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Model;

final class Column
{
    public function __construct(
        private readonly string $name,
        private readonly string $type = 'string',
        private readonly array $modifiers = [],
        private readonly array $attributes = [],
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
            ->filter(fn ($modifier) => (\is_array($modifier) && \key($modifier) === 'foreign') || $modifier === 'foreign')
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
            ->first(fn ($value, $key) => $key === 'default');
    }
}
