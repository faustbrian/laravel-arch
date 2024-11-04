<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\Nova\MakeFilterCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class FilterGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Nova\Filter
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
