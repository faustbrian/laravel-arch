<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Laravel;

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
