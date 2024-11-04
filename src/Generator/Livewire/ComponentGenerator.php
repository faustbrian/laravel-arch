<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Livewire;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class ComponentGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        foreach (Tree::get('livewire.components') as $component) {
            $this->createFile(
                $component->name(),
                $this->renderClass($component, $component->inline() ? 'livewire/component/inline' : 'livewire/component/component', [
                    'class' => $component->name(),
                    'view' => $component->view(),
                ]),
            );
        }

        $this->persist();
    }

    protected function accessor(): string
    {
        return 'livewire.components';
    }
}
