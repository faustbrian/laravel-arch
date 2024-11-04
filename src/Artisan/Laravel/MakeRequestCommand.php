<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Artisan\Laravel;

use BaseCodeOy\Arch\Artisan\AbstractCommand;

final class MakeRequestCommand extends AbstractCommand
{
    protected function signature(): string
    {
        return 'make:request';
    }
}
