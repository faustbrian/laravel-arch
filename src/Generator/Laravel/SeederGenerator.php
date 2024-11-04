<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Laravel;

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
            $this->createFile(
                $seeder->nameWithSuffix(),
                $this->renderClass($seeder, 'laravel/seeder/seeder', [
                    'class' => $seeder->nameWithSuffix(),
                ]),
            );
        }

        $this->persist();
    }
}
