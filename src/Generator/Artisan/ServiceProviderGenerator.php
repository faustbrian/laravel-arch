<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\MakeServiceProviderCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class ServiceProviderGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\ServiceProvider
         */
        foreach (Tree::get('serviceProviders') as $cast) {
            $artisan = new MakeServiceProviderCommand();
            $artisan->name($cast->nameWithSuffix());
            $artisan->handle();
        }
    }
}
