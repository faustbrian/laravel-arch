<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Artisan\Laravel\Nova;

use BaseCodeOy\Arch\Artisan\AbstractCommand;

final class MakeFilterCommand extends AbstractCommand
{
    public function boolean(): static
    {
        $this->option('boolean');

        return $this;
    }

    public function date(): static
    {
        $this->option('date');

        return $this;
    }

    protected function signature(): string
    {
        return 'nova:filter';
    }
}
