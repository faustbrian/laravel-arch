<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Artisan\Laravel;

use BombenProdukt\Arch\Artisan\AbstractCommand;

final class MakeTestCommand extends AbstractCommand
{
    public function pest(): static
    {
        $this->option('pest');

        return $this;
    }

    public function unit(): static
    {
        $this->option('unit');

        return $this;
    }

    protected function signature(): string
    {
        return 'make:test';
    }
}
