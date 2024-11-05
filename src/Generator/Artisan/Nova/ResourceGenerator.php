<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\Nova\MakeResourceCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class ResourceGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Nova\Resource
         */
        foreach (Tree::get('nova.resources') as $resource) {
            $artisan = new MakeResourceCommand();
            $artisan->name($resource->name());
            $artisan->model($resource->name());
            $artisan->handle();
        }
    }
}
