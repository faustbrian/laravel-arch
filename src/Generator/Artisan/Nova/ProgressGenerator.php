<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\Nova\MakeProgressCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class ProgressGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Nova\Metric
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
