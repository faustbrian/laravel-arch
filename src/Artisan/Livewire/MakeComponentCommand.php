<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Artisan\Livewire;

use BaseCodeOy\Arch\Artisan\AbstractCommand;

final class MakeComponentCommand extends AbstractCommand
{
    public function inline(): static
    {
        $this->option('inline');

        return $this;
    }

    public function test(): static
    {
        $this->option('test');

        return $this;
    }

    protected function signature(): string
    {
        return 'make:livewire';
    }
}
