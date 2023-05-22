<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\Nova\MakeProgressCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class ProgressGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Nova\Metric
         */
        foreach (Tree::get('nova.progress') as $metric) {
            if (!$metric->progress()) {
                continue;
            }

            $artisan = new MakeProgressCommand();
            $artisan->name($metric->name());
            $artisan->handle();
        }
    }
}
