<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Generator\Livewire;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class ViewGenerator extends AbstractGenerator
{
    #[\Override()]
    public function generate(): void
    {
        foreach (Tree::get('livewire.components') as $component) {
            if ($component->inline()) {
                continue;
            }

            $this->createFile(
                $component->nameWithSuffixForView(),
                $this->renderFile($component, 'livewire/view'),
            );
        }

        $this->persist();
    }

    #[\Override()]
    protected function accessor(): string
    {
        return 'livewire.views';
    }
}
