<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Laravel\Nova;

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
            $this->createFile(
                $dashboard->name(),
                $this->renderClass($dashboard, 'laravel/nova/dashboard', [
                    'class' => $dashboard->name(),
                ]),
            );
        }

        $this->persist();
    }

    protected function accessor(): string
    {
        return 'nova.dashboards';
    }
}
