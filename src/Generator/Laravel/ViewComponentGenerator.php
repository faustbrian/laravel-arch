<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Laravel;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class ViewComponentGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\ViewComponent
         */
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
