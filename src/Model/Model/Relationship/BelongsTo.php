<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Model\Model\Relationship;

final class BelongsTo extends AbstractRelationship
{
    public function __construct(
        private readonly string $related,
        private readonly ?string $foreignKey = null,
        private readonly ?string $ownerKey = null,
        private readonly ?string $relation = null,
    ) {}

    public function related(): string
    {
        return $this->related;
    }

    public function foreignKey(): ?string
    {
        return $this->foreignKey;
    }

    public function ownerKey(): ?string
    {
        return $this->ownerKey;
    }

    public function relation(): ?string
    {
        return $this->relation;
    }

    public function toArray(): array
    {
        return [
            'related' => $this->related,
            'foreignKey' => $this->foreignKey,
            'ownerKey' => $this->ownerKey,
            'relation' => $this->relation,
        ];
    }
}
