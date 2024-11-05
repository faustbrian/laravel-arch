<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\MakeMigrationCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class MigrationGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Migration
         */
        foreach (Tree::get('migrations') as $migration) {
            $artisan = new MakeMigrationCommand();
            $artisan->name($migration->name());
            $artisan->handle();
        }
    }
}
