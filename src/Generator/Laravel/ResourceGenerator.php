<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Generator\Laravel;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class ResourceGenerator extends AbstractGenerator
{
    #[\Override()]
    public function generate(): void
    {
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
