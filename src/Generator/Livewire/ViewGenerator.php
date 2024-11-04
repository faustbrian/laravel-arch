<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Livewire;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class ViewGenerator extends AbstractGenerator
{
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

    protected function accessor(): string
    {
        return 'livewire.views';
    }
}
