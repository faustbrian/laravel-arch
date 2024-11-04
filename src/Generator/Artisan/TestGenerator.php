<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\MakeTestCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class TestGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Test
         */
        foreach (Tree::get('tests') as $resource) {
            $artisan = new MakeTestCommand();
            $artisan->name($resource->nameWithSuffix());
            $artisan->handle();
        }
    }
}
