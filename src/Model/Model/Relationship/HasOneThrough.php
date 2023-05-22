<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Model\Model\Relationship;

final class HasOneThrough extends AbstractRelationship
{
    public function __construct(
        private readonly string $related,
        private readonly string $through,
        private readonly ?string $firstKey = null,
        private readonly ?string $secondKey = null,
        private readonly ?string $localKey = null,
        private readonly ?string $secondLocalKey = null,
    ) {}

    public function related(): string
    {
        return $this->related;
    }

    public function through(): ?string
    {
        return $this->through;
    }

    public function firstKey(): ?string
    {
        return $this->firstKey;
    }

    public function secondKey(): ?string
    {
        return $this->secondKey;
    }

    public function localKey(): ?string
    {
        return $this->localKey;
    }

    public function secondLocalKey(): ?string
    {
        return $this->secondLocalKey;
    }

    public function toArray(): array
    {
        return [
            'related' => $this->related,
            'through' => $this->through,
            'firstKey' => $this->firstKey,
            'secondKey' => $this->secondKey,
            'localKey' => $this->localKey,
            'secondLocalKey' => $this->secondLocalKey,
        ];
    }
}
