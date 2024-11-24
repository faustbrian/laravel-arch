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

final class CastableGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /** @var \BaseCodeOy\Arch\Model\Castable */
        foreach (Tree::get('castables') as $castable) {
            $this->createFile(
                $castable->name(),
                $this->renderClass($castable, $castable->castsAttributes() ? 'laravel/castable/casts-attributes' : 'laravel/castable/castable', [
                    'class' => $castable->name(),
                ]),
            );
        }

        $this->persist();
    }
}
