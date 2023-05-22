<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Laravel;

use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class PivotGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Pivot
         */
        foreach (Tree::get('pivots') as $pivot) {
            $this->createFile(
                $pivot->name(),
                $this->renderClass($pivot, 'laravel/pivot/pivot', [
                    'class' => $pivot->name(),
                ]),
            );
        }

        $this->persist();
    }
}
