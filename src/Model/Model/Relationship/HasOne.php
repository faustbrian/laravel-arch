<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Model\Model\Relationship;

final class HasOne extends AbstractRelationship
{
    public function __construct(
        private readonly string $related,
        private readonly ?string $foreignKey = null,
        private readonly ?string $localKey = null,
    ) {}

    public function related(): string
    {
        return $this->related;
    }

    public function foreignKey(): ?string
    {
        return $this->foreignKey;
    }

    public function localKey(): ?string
    {
        return $this->localKey;
    }

    public function toArray(): array
    {
        return [
            'related' => $this->related,
            'foreignKey' => $this->foreignKey,
            'localKey' => $this->localKey,
        ];
    }
}
