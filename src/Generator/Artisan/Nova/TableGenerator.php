<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\Nova\MakeTableCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class TableGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Nova\Metric
         */
        foreach (Tree::get('nova.table') as $metric) {
            if (!$metric->table()) {
                continue;
            }

            $artisan = new MakeTableCommand();
            $artisan->name($metric->name());
            $artisan->handle();
        }
    }
}
