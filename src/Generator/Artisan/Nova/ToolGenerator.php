<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\Nova\MakeToolCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class ToolGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Observer
         */
        foreach (Tree::get('nova.tools') as $tool) {
            $artisan = new MakeToolCommand();
            $artisan->name($tool->nameWithSuffix());
            $artisan->handle();
        }
    }
}
