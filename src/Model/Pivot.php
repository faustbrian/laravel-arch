<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Model;

final class Pivot extends AbstractData
{
    public function __construct(private readonly string $name)
    {
        $this->normalizeNamespace($name);
    }

    public function name(): string
    {
        return $this->basename($this->name);
    }
}
