<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Model\Model;

use BombenProdukt\Arch\Model\AbstractData;
use Illuminate\Support\Str;

final class GlobalScope extends AbstractData
{
    public function __construct(private readonly string $name)
    {
        $this->normalizeNamespace($name);
    }

    public function name(): string
    {
        return $this->basename($this->name);
    }

    public function nameWithSuffix(): string
    {
        return Str::suffix($this->name, 'Scope');
    }

    public function nameWithSuffixForTest(): string
    {
        return Str::suffix($this->nameWithSuffix(), 'Test');
    }

    public function nameForBooted(): string
    {
        return Str::camel($this->name);
    }
}
