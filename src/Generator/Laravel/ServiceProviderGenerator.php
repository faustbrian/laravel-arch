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

final class ServiceProviderGenerator extends AbstractGenerator
{
    #[\Override()]
    public function generate(): void
    {
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
