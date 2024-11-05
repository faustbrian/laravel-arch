<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\MakeComponentCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class ComponentGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\ViewComponent
         */
        foreach (Tree::get('viewComponents') as $cast) {
            $artisan = new MakeComponentCommand();
            $artisan->name($cast->name());

            if ($cast->inline()) {
                $artisan->inline();
            }

            $artisan->handle();
        }
    }
}
