<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Laravel;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class ViewGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\View
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
