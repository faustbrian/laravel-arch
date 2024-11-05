<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Model\Nova;

use BaseCodeOy\Arch\Model\AbstractData;

final class Metric extends AbstractData
{
    public function __construct(
        private readonly string $name,
        private readonly string $type,
    ) {
        $this->normalizeNamespace($name);
    }

    public function name(): string
    {
        return $this->basename($this->name);
    }

    public function type(): string
    {
        return $this->type;
    }

    public function partition(): bool
    {
        return $this->type === 'partition';
    }

    public function progress(): bool
    {
        return $this->type === 'progress';
    }

    public function table(): bool
    {
        return $this->type === 'table';
    }

    public function trend(): bool
    {
        return $this->type === 'trend';
    }

    public function value(): bool
    {
        return $this->type === 'value';
    }

    protected function accessor(): string
    {
        return 'nova.metrics';
    }
}
