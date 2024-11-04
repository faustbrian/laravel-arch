<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Model\Model\Relationship;

final class MorphOne extends AbstractRelationship
{
    public function __construct(
        private readonly string $related,
        private readonly string $name,
        private readonly ?string $type = null,
        private readonly ?string $id = null,
        private readonly ?string $localKey = null,
    ) {}

    public function related(): string
    {
        return $this->related;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function type(): string
    {
        return $this->type;
    }

    public function id(): ?string
    {
        return $this->id;
    }

    public function localKey(): ?string
    {
        return $this->localKey;
    }

    public function toArray(): array
    {
        return [
            'related' => $this->related,
            'name' => $this->name,
            'type' => $this->type,
            'id' => $this->id,
            'localKey' => $this->localKey,
        ];
    }
}
