<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\MakeScopeCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class ScopeGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Model\GlobalScope
         */
        foreach (Tree::get('scopes') as $scope) {
            $artisan = new MakeScopeCommand();
            $artisan->name($scope->nameWithSuffix());
            $artisan->handle();
        }
    }
}
