<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\Nova\MakeCustomFilterCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class CustomFilterGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Nova\CustomFilter
         */
        foreach (Tree::get('nova.customFilters') as $customFilter) {
            $artisan = new MakeCustomFilterCommand();
            $artisan->name($customFilter->name());
            $artisan->handle();
        }
    }
}
