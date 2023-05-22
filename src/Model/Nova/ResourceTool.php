<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Model\Nova;

use BombenProdukt\Arch\Model\AbstractData;

final class ResourceTool extends AbstractData
{
    public function __construct(private readonly string $name)
    {
        $this->normalizeNamespace($name);
    }

    public function name(): string
    {
        return $this->basename($this->name);
    }

    protected function accessor(): string
    {
        return 'nova.resourceTools';
    }
}
