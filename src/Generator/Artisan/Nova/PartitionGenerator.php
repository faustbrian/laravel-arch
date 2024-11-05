<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\Nova\MakePartitionCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class PartitionGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Nova\Metric
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
