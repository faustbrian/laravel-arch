<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Model;

final class Notification extends AbstractData
{
    public function __construct(
        private readonly string $name,
        private readonly ?string $view = null,
        private readonly bool $shouldQueue = false,
        private readonly bool $shouldBeMarkdown = false,
    ) {
        $this->normalizeNamespace($name);
    }

    public function name(): string
    {
        return $this->basename($this->name);
    }

    public function view(): ?string
    {
        return $this->view;
    }

    public function shouldQueue(): bool
    {
        return $this->shouldQueue;
    }

    public function shouldBeMarkdown(): bool
    {
        return $this->shouldBeMarkdown;
    }
}
