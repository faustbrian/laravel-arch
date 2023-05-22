<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Model\Model\Relationship;

use Illuminate\Contracts\Support\Arrayable;

interface RelationshipInterface extends Arrayable
{
    public function identifier(): string;

    public function import(): string;

    public function relationship(): string;

    public function toArray(): array;
}
