<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Model;

final class Event extends AbstractData
{
    public function __construct(
        private readonly string $name,
        private readonly bool $shouldBroadcast = false,
    ) {
        $this->normalizeNamespace($name);
    }

    public function name(): string
    {
        return $this->basename($this->name);
    }

    public function shouldBroadcast(): bool
    {
        return $this->shouldBroadcast;
    }
}
