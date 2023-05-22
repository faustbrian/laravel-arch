<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\MakeComponentCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class ComponentGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\ViewComponent
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
