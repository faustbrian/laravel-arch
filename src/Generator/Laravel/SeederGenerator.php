<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Laravel;

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
