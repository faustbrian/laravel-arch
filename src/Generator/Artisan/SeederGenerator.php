<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\MakeSeederCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class SeederGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Seeder
         */
        foreach (Tree::get('seeders') as $seeder) {
            $artisan = new MakeSeederCommand();
            $artisan->name($seeder->nameWithSuffix());
            $artisan->handle();
        }
    }
}
