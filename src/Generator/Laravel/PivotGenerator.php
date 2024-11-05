<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Laravel;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class PivotGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Pivot
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
