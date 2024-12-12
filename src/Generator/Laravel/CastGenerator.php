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

final class CastGenerator extends AbstractGenerator
{
    #[\Override()]
    public function generate(): void
    {
        foreach (Tree::get('casts') as $cast) {
            $this->createFile(
                $cast->name(),
                $this->renderClass($cast, $cast->inbound() ? 'laravel/cast/inbound' : 'laravel/cast/cast', [
                    'class' => $cast->name(),
                ]),
            );
        }

        $this->persist();
    }
}
