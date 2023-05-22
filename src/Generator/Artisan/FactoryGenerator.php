<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\MakeFactoryCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class FactoryGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Factory
         */
        foreach (Tree::get('factories') as $factory) {
            $artisan = new MakeFactoryCommand();
            $artisan->name($factory->nameWithSuffix());
            $artisan->model($factory->name());
            $artisan->handle();
        }
    }
}
