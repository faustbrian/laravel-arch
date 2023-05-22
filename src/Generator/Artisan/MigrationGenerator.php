<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\MakeMigrationCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class MigrationGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Migration
         */
        foreach (Tree::get('migrations') as $migration) {
            $artisan = new MakeMigrationCommand();
            $artisan->name($migration->name());
            $artisan->handle();
        }
    }
}
