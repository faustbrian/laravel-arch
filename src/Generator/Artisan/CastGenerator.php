<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\MakeCastCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class CastGenerator extends AbstractGenerator
{
    #[\Override()]
    public function generate(): void
    {
        foreach (Tree::get('casts') as $cast) {
            $artisan = new MakeCastCommand();
            $artisan->name($cast->name());

            if ($cast->inbound()) {
                $artisan->inbound();
            }

            $artisan->force();

            $this->createFileFromCommand($artisan);
        }
    }
}
