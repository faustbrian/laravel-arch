<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Model;

use Illuminate\Contracts\Support\Arrayable;

final class GeneratorResult implements Arrayable
{
    public function __construct(
        private readonly array $created = [],
        private readonly array $deleted = [],
        private readonly array $updated = [],
    ) {}

    public function created(): array
    {
        return $this->created;
    }

    public function deleted(): array
    {
        return $this->deleted;
    }

    public function updated(): array
    {
        return $this->updated;
    }

    public function toArray(): array
    {
        return [
            'created' => $this->created,
            'deleted' => $this->deleted,
            'updated' => $this->updated,
        ];
    }
}
