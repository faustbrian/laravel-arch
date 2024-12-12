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

final class GlobalScopeGenerator extends AbstractGenerator
{
    #[\Override()]
    public function generate(): void
    {
        foreach (Tree::get('globalScopes') as $globalScope) {
            $this->createFile(
                $globalScope->nameWithSuffix(),
                $this->renderClass($globalScope, 'laravel/scope/scope', [
                    'class' => $globalScope->nameWithSuffix(),
                ]),
            );
        }

        $this->persist();
    }
}
