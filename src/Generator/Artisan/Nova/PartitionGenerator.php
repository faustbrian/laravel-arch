<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\Nova\MakePartitionCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class PartitionGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Nova\Metric
         */
        foreach (Tree::get('nova.partition') as $metric) {
            if (!$metric->partition()) {
                continue;
            }

            $artisan = new MakePartitionCommand();
            $artisan->name($metric->name());
            $artisan->handle();
        }
    }
}
