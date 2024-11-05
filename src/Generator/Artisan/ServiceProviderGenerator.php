<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\MakeServiceProviderCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class ServiceProviderGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\ServiceProvider
         */
        foreach (Tree::get('serviceProviders') as $cast) {
            $artisan = new MakeServiceProviderCommand();
            $artisan->name($cast->nameWithSuffix());
            $artisan->handle();
        }
    }
}
