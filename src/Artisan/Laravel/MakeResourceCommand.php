<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Artisan\Laravel;

use BaseCodeOy\Arch\Artisan\AbstractCommand;

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
