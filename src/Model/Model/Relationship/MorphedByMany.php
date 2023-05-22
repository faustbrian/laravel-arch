<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Model\Model\Relationship;

use Illuminate\Support\Str;

final class MorphedByMany extends AbstractRelationship
{
    public function __construct(
        private readonly string $related,
        private readonly string $name,
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

    public function name(): ?string
    {
        return $this->name;
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

    public function import(): string
    {
        return 'Illuminate\\Database\\Eloquent\\Relations\\MorphToMany';
    }

    public function tableName(): string
    {
        return Str::lower(Str::plural(Str::singular($this->related).'able'));
    }

    public function toArray(): array
    {
        return [
            'related' => $this->related,
            'name' => $this->name,
            'table' => $this->table,
            'foreignPivotKey' => $this->foreignPivotKey,
            'relatedPivotKey' => $this->relatedPivotKey,
            'parentKey' => $this->parentKey,
            'relatedKey' => $this->relatedKey,
            'relation' => $this->relation,
        ];
    }
}
