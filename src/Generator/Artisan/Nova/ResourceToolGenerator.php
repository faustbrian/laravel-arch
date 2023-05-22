<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\Nova\MakeResourceToolCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class ResourceToolGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Nova\Resource
         */
        foreach (Tree::get('nova.resourceTools') as $resourceTool) {
            $artisan = new MakeResourceToolCommand();
            $artisan->name($resourceTool->name());
            $artisan->handle();
        }
    }
}
