<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Laravel;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class GlobalScopeGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Model\GlobalScope
         */
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
