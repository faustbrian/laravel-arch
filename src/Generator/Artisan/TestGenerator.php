<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\MakeTestCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class TestGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Test
         */
        foreach (Tree::get('tests') as $resource) {
            $artisan = new MakeTestCommand();
            $artisan->name($resource->nameWithSuffix());
            $artisan->handle();
        }
    }
}
