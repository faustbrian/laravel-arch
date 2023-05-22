<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Laravel;

use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class ResourceCollectionGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\ResourceCollection
         */
        foreach (Tree::get('resourceCollections') as $collection) {
            $this->createFile(
                $collection->nameWithSuffix(),
                $this->renderClass($collection, 'laravel/resource/collection', [
                    'class' => $collection->nameWithSuffix(),
                ]),
            );
        }

        $this->persist();
    }
}
