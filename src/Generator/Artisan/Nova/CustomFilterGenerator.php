<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\Nova\MakeCustomFilterCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class CustomFilterGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Nova\CustomFilter
         */
        foreach (Tree::get('nova.customFilters') as $customFilter) {
            $artisan = new MakeCustomFilterCommand();
            $artisan->name($customFilter->name());
            $artisan->handle();
        }
    }
}
