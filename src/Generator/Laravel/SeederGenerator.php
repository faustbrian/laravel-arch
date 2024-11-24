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

final class SeederGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /** @var \BaseCodeOy\Arch\Model\Seeder */
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
