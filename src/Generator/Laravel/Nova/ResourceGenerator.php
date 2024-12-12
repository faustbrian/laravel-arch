<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Generator\Laravel\Nova;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;
use Illuminate\Support\Str;

final class ResourceGenerator extends AbstractGenerator
{
    #[\Override()]
    public function generate(): void
    {
        foreach (Tree::get('nova.resources') as $resource) {
            $this->createFile(
                $resource->name(),
                $this->renderClass($resource, 'laravel/nova/resource', [
                    'class' => $resource->name(),
                    'namespacedModel' => Str::modelNamespace($resource->name()),
                ]),
            );
        }

        $this->persist();
    }

    #[\Override()]
    protected function accessor(): string
    {
        return 'nova.resources';
    }
}
