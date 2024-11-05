<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Laravel;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class ResourceCollectionGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\ResourceCollection
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
