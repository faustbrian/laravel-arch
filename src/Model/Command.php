<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Model;

final class Command extends AbstractData
{
    public function __construct(
        private readonly string $name,
        private readonly string $signature,
        private readonly string $description,
    ) {
        $this->normalizeNamespace($name);
    }

    public function name(): string
    {
        return $this->basename($this->name);
    }

    public function signature(): string
    {
        return $this->signature;
    }

    public function description(): string
    {
        return $this->description;
    }
}
