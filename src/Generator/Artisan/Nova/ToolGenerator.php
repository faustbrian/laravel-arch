<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\Nova\MakeToolCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class ToolGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Observer
         */
        foreach (Tree::get('nova.tools') as $tool) {
            $artisan = new MakeToolCommand();
            $artisan->name($tool->nameWithSuffix());
            $artisan->handle();
        }
    }
}
