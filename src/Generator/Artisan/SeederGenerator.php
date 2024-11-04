<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\MakeSeederCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class SeederGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Seeder
         */
        foreach (Tree::get('seeders') as $seeder) {
            $artisan = new MakeSeederCommand();
            $artisan->name($seeder->nameWithSuffix());
            $artisan->handle();
        }
    }
}
