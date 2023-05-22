<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\Nova\MakeResourceCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class ResourceGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Nova\Resource
         */
        foreach (Tree::get('nova.resources') as $resource) {
            $artisan = new MakeResourceCommand();
            $artisan->name($resource->name());
            $artisan->model($resource->name());
            $artisan->handle();
        }
    }
}
