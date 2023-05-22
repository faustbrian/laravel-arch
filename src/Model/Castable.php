<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Model;

final class Castable extends AbstractData
{
    public function __construct(
        private readonly string $name,
        private readonly bool $castsAttributes = false,
    ) {
        $this->normalizeNamespace($name);
    }

    public function name(): string
    {
        return $this->basename($this->name);
    }

    public function castsAttributes(): bool
    {
        return $this->castsAttributes;
    }
}
