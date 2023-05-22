<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Model;

final class Cast extends AbstractData
{
    public function __construct(
        private readonly string $name,
        private readonly bool $inbound = false,
    ) {
        $this->normalizeNamespace($name);
    }

    public function name(): string
    {
        return $this->basename($this->name);
    }

    public function inbound(): bool
    {
        return $this->inbound;
    }
}
