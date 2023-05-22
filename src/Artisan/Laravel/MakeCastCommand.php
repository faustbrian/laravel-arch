<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Artisan\Laravel;

use BombenProdukt\Arch\Artisan\AbstractCommand;

final class MakeCastCommand extends AbstractCommand
{
    public function inbound(): static
    {
        $this->option('inbound');

        return $this;
    }

    protected function signature(): string
    {
        return 'make:cast';
    }
}
