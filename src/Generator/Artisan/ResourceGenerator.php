<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\MakeResourceCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class ResourceGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Resource
         */
        foreach (Tree::get('resources') as $resource) {
            $artisan = new MakeResourceCommand();
            $artisan->name($resource->nameWithSuffix());
            $artisan->handle();
        }
    }
}
