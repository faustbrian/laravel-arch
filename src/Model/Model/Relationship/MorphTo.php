<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Model\Model\Relationship;

final class MorphTo extends AbstractRelationship
{
    public function __construct(
        private readonly ?string $name = null,
        private readonly ?string $type = null,
        private readonly ?string $id = null,
        private readonly ?string $ownerKey = null,
    ) {}

    public function name(): ?string
    {
        return $this->name;
    }

    public function type(): ?string
    {
        return $this->type;
    }

    public function id(): ?string
    {
        return $this->id;
    }

    public function ownerKey(): ?string
    {
        return $this->ownerKey;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'id' => $this->id,
            'ownerKey' => $this->ownerKey,
        ];
    }
}
