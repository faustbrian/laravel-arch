<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Model;

final class Job extends AbstractData
{
    public function __construct(
        private readonly string $name,
        private readonly bool $shouldQueue = false,
        private readonly bool $shouldBeUnique = false,
    ) {
        $this->normalizeNamespace($name);
    }

    public function name(): string
    {
        return $this->basename($this->name);
    }

    public function shouldQueue(): bool
    {
        return $this->shouldQueue;
    }

    public function shouldBeUnique(): bool
    {
        return $this->shouldBeUnique;
    }
}
