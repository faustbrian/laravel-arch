<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\MakeResourceCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class ResourceGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Resource
         */
        foreach (Tree::get('resources') as $resource) {
            $artisan = new MakeResourceCommand();
            $artisan->name($resource->nameWithSuffix());
            $artisan->handle();
        }
    }
}
