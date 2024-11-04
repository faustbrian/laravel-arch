<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\Nova\MakeTrendCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class TrendGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Nova\Metric
         */
        foreach (Tree::get('nova.trend') as $metric) {
            if (!$metric->trend()) {
                continue;
            }

            $artisan = new MakeTrendCommand();
            $artisan->name($metric->name());
            $artisan->handle();
        }
    }
}
