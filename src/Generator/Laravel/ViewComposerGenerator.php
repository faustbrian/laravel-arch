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

final class ViewComposerGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /** @var \BaseCodeOy\Arch\Model\ViewComposer */
        foreach (Tree::get('viewComposers') as $composer) {
            $this->createFile(
                $composer->nameWithSuffix(),
                $this->renderClass($composer, 'laravel/view/composer', [
                    'class' => $composer->nameWithSuffix(),
                ]),
            );
        }

        $this->persist();
    }
}
