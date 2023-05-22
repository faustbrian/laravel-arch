<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Artisan\Laravel;

use BombenProdukt\Arch\Artisan\AbstractCommand;

final class MakeResourceCommand extends AbstractCommand
{
    public function collection(): static
    {
        $this->option('collection');

        return $this;
    }

    protected function signature(): string
    {
        return 'make:resource';
    }
}
