<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Model;

final class Migration extends AbstractData
{
    public function __construct(
        private readonly string $name,
        private readonly array $columns,
        private readonly array $indexes,
    ) {}

    public function name(): string
    {
        return $this->name;
    }

    public function columns(): array
    {
        return $this->columns;
    }

    public function indexes(): array
    {
        return $this->indexes;
    }
}
