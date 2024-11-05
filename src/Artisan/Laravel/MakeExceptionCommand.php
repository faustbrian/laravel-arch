<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Artisan\Laravel;

use BaseCodeOy\Arch\Artisan\AbstractCommand;

final class MakeExceptionCommand extends AbstractCommand
{
    public function render(): static
    {
        $this->option('render');

        return $this;
    }

    public function report(): static
    {
        $this->option('report');

        return $this;
    }

    protected function signature(): string
    {
        return 'make:exception';
    }
}
