<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Laravel;

use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class GlobalScopeGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Model\GlobalScope
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
