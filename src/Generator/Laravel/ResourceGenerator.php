<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Laravel;

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
            $this->createFile(
                $resource->nameWithSuffix(),
                $this->renderClass($resource, 'laravel/resource/resource', [
                    'class' => $resource->nameWithSuffix(),
                ]),
            );
        }

        $this->persist();
    }
}
