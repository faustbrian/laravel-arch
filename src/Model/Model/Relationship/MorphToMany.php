<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Model\Model\Relationship;

final class MorphToMany extends AbstractRelationship
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
        private readonly bool $inverse = false,
    ) {}

    public function related(): string
    {
        return $this->related;
    }

    public function name(): string
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

    public function inverse(): bool
    {
        return $this->inverse;
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
            'inverse' => $this->inverse,
        ];
    }
}
