<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Laravel;

use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class ViewComponentGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\ViewComponent
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
