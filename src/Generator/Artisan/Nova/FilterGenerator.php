<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\Nova\MakeFilterCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class FilterGenerator extends AbstractGenerator
{
    #[\Override()]
    public function generate(): void
    {
        foreach (Tree::get('nova.filters') as $filter) {
            $artisan = new MakeFilterCommand();
            $artisan->name($filter->name());

            if ($filter->boolean()) {
                $artisan->boolean();
            }

            if ($filter->date()) {
                $artisan->date();
            }

            $artisan->handle();
        }
    }
}
