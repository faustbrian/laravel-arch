<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Model\Model\Relationship;

use BombenProdukt\Arch\Model\Model;
use Illuminate\Support\Str;

final class BelongsToMany extends AbstractRelationship
{
    public function __construct(
        private readonly string $related,
        private readonly ?string $table = null,
        private readonly ?string $foreignPivotKey = null,
        private readonly ?string $relatedPivotKey = null,
        private readonly ?string $parentKey = null,
        private readonly ?string $relatedKey = null,
        private readonly ?string $relation = null,
    ) {}

    public function related(): string
    {
        return $this->related;
    }

    public function table(): ?string
    {
        return $this->table;
    }

    public function foreignPivotKey(): ?string
    {
        return $this->foreignPivotKey;
    }

    public function relatedPivotKey(): ?string
    {
        return $this->relatedPivotKey;
    }

    public function parentKey(): ?string
    {
        return $this->parentKey;
    }

    public function relatedKey(): ?string
    {
        return $this->relatedKey;
    }

    public function relation(): ?string
    {
        return $this->relation;
    }

    public function models(Model $parent): array
    {
        $models = [$this->related, Str::className($parent->name())];

        \sort($models);

        return $models;
    }

    public function tableName(Model $parent): string
    {
        $segments = \array_map(fn ($name) => Str::snake($name), $this->models($parent));

        \sort($segments);

        return \mb_strtolower(\implode('_', $segments));
    }

    public function toArray(): array
    {
        return [
            'related' => $this->related,
            'table' => $this->table,
            'foreignPivotKey' => $this->foreignPivotKey,
            'relatedPivotKey' => $this->relatedPivotKey,
            'parentKey' => $this->parentKey,
            'relatedKey' => $this->relatedKey,
            'relation' => $this->relation,
        ];
    }
}
