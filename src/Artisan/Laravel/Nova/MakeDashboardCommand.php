<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Artisan\Laravel\Nova;

use BaseCodeOy\Arch\Artisan\AbstractCommand;

final class MakeDashboardCommand extends AbstractCommand
{
    protected function signature(): string
    {
        return 'nova:dashboard';
    }
}
