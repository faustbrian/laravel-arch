<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Laravel;

use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class ServiceProviderGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\ServiceProvider
         */
        foreach (Tree::get('serviceProviders') as $serviceProvider) {
            $this->createFile(
                $serviceProvider->nameWithSuffix(),
                $this->renderClass($serviceProvider, 'laravel/provider/provider', [
                    'class' => $serviceProvider->nameWithSuffix(),
                ]),
            );
        }

        $this->persist();
    }
}
