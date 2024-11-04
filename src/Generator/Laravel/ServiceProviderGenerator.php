<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Laravel;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class ServiceProviderGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\ServiceProvider
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
