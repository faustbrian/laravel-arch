<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\Nova\MakeDashboardCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class DashboardGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Nova\Dashboard
         */
        foreach (Tree::get('nova.dashboards') as $dashboard) {
            $artisan = new MakeDashboardCommand();
            $artisan->name($dashboard->name());
            $artisan->handle();
        }
    }
}
