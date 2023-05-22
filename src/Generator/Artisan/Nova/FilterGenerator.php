<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\Nova\MakeFilterCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class FilterGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Nova\Filter
         */
        foreach (Tree::get('nova.filters') as $filter) {
            $artisan = new MakeFilterCommand();
            $artisan->name($filter->name());

            if ($filter->boolean()) {
                $artisan->boolean();
            }

            if ($filter->date()) {
                $artisan->date();
            }

            $artisan->handle();
        }
    }
}
