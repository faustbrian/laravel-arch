<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Artisan\Laravel\Nova;

use BombenProdukt\Arch\Artisan\AbstractCommand;

final class MakePartitionCommand extends AbstractCommand
{
    protected function signature(): string
    {
        return 'nova:partition';
    }
}
