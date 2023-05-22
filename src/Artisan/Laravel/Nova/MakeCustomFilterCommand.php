<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Artisan\Laravel\Nova;

use BombenProdukt\Arch\Artisan\AbstractCommand;

final class MakeCustomFilterCommand extends AbstractCommand
{
    protected function signature(): string
    {
        return 'nova:custom-filter';
    }
}
