<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\Nova\MakeTableCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class TableGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Nova\Metric
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
