<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\MakeScopeCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class ScopeGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Model\GlobalScope
         */
        foreach (Tree::get('scopes') as $scope) {
            $artisan = new MakeScopeCommand();
            $artisan->name($scope->nameWithSuffix());
            $artisan->handle();
        }
    }
}
