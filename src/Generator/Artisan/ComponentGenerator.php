<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\MakeComponentCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class ComponentGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /** @var \BaseCodeOy\Arch\Model\ViewComponent */
        foreach (Tree::get('viewComponents') as $cast) {
            $artisan = new MakeComponentCommand();
            $artisan->name($cast->name());

            if ($cast->inline()) {
                $artisan->inline();
            }

            $artisan->handle();
        }
    }
}
