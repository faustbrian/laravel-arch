<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\MakeFactoryCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class FactoryGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Factory
         */
        foreach (Tree::get('factories') as $factory) {
            $artisan = new MakeFactoryCommand();
            $artisan->name($factory->nameWithSuffix());
            $artisan->model($factory->name());
            $artisan->handle();
        }
    }
}
