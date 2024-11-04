<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Model\Nova;

use BaseCodeOy\Arch\Model\AbstractData;

final class Action extends AbstractData
{
    public function __construct(
        private readonly string $name,
        private readonly bool $shouldBeDestructive = false,
        private readonly bool $shouldBeQueued = false,
    ) {
        $this->normalizeNamespace($name);
    }

    public function name(): string
    {
        return $this->basename($this->name);
    }

    public function shouldBeDestructive(): bool
    {
        return $this->shouldBeDestructive;
    }

    public function shouldBeQueued(): bool
    {
        return $this->shouldBeQueued;
    }

    protected function accessor(): string
    {
        return 'nova.actions';
    }
}
