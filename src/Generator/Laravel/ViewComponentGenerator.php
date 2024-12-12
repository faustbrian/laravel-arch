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

final class ViewComponentGenerator extends AbstractGenerator
{
    #[\Override()]
    public function generate(): void
    {
        foreach (Tree::get('viewComponents') as $component) {
            $this->createFile(
                $component->name(),
                $this->renderClass($component, 'laravel/view/component', [
                    'class' => $component->name(),
                    'view' => $component->view(),
                ]),
            );
        }

        $this->persist();
    }
}
