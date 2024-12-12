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
use Illuminate\Support\Str;

final class TestGenerator extends AbstractGenerator
{
    #[\Override()]
    public function generate(): void
    {
        foreach (Tree::get('livewire.components') as $component) {
            $this->createFile(
                $component->nameWithSuffixForTest(),
                $this->renderClass($component, 'livewire/test/component', [
                    'class' => $component->name(),
                    'namespacedComponent' => Str::livewireComponentNamespace($component->name()),
                ]),
            );
        }

        $this->persist();
    }

    #[\Override()]
    protected function accessor(): string
    {
        return 'livewire.tests';
    }
}
