<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Generator\Laravel;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class PivotGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /** @var \BaseCodeOy\Arch\Model\Pivot */
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
