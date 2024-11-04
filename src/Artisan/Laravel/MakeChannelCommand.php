<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Artisan\Laravel;

use BaseCodeOy\Arch\Artisan\AbstractCommand;

final class MakeChannelCommand extends AbstractCommand
{
    public function command(string $command): static
    {
        $this->option('command', $command);

        return $this;
    }

    public function pest(): static
    {
        $this->option('pest');

        return $this;
    }

    public function test(): static
    {
        $this->option('test');

        return $this;
    }

    protected function signature(): string
    {
        return 'make:channel';
    }
}
