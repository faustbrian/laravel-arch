<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Model;

final class Manifest
{
    private readonly string $arch;

    private readonly array $definitions;

    public function arch(): string
    {
        return $this->arch;
    }

    public function definitions(): array
    {
        return $this->definitions;
    }

    public function setVersion(string $arch): void
    {
        $this->arch = $arch;
    }

    public function setDefinitions(array $definitions): void
    {
        $this->definitions = $definitions;
    }
}
