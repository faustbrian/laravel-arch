<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\MakeObserverCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class LensGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Nova\Lens
         */
        foreach (Tree::get('nova.lenses') as $lens) {
            $artisan = new MakeObserverCommand();
            $artisan->name($lens->name());
            $artisan->handle();
        }
    }
}
