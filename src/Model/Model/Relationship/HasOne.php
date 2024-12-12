<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

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

    #[\Override()]
    public function toArray(): array
    {
        return [
            'related' => $this->related,
            'foreignKey' => $this->foreignKey,
            'localKey' => $this->localKey,
        ];
    }
}
