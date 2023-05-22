<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Artisan\Laravel;

use BombenProdukt\Arch\Artisan\AbstractCommand;

final class MakeComponentCommand extends AbstractCommand
{
    public function inline(): static
    {
        $this->option('inline');

        return $this;
    }

    public function view(): static
    {
        $this->option('view');

        return $this;
    }

    protected function signature(): string
    {
        return 'make:component';
    }
}
