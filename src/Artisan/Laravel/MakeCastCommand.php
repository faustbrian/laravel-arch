<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Artisan\Laravel;

use BaseCodeOy\Arch\Artisan\AbstractCommand;

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
