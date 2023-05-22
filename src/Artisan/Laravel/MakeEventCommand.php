<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Artisan\Laravel;

use BombenProdukt\Arch\Artisan\AbstractCommand;

final class MakeEventCommand extends AbstractCommand
{
    protected function signature(): string
    {
        return 'make:event';
    }
}
