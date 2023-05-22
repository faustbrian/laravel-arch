<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Laravel;

use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class ViewGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\View
         */
        foreach (Tree::get('views') as $view) {
            $this->createFile(
                $view->name().'.blade',
                $this->renderFile($view, 'laravel/view/view'),
            );
        }

        $this->persist();
    }
}
