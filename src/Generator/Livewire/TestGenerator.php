<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Livewire;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;
use Illuminate\Support\Str;

final class TestGenerator extends AbstractGenerator
{
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

    protected function accessor(): string
    {
        return 'livewire.tests';
    }
}
