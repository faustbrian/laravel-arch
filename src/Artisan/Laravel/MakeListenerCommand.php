<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Artisan\Laravel;

use BombenProdukt\Arch\Artisan\AbstractCommand;

final class MakeListenerCommand extends AbstractCommand
{
    public function event(string $event): static
    {
        $this->option('event', $event);

        return $this;
    }

    public function pest(): static
    {
        $this->option('pest');

        return $this;
    }

    public function queued(): static
    {
        $this->option('queued');

        return $this;
    }

    public function test(): static
    {
        $this->option('test');

        return $this;
    }

    protected function signature(): string
    {
        return 'make:listener';
    }
}
