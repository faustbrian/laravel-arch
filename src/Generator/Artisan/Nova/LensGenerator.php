<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\MakeObserverCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class LensGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Nova\Lens
         */
        foreach (Tree::get('nova.lenses') as $lens) {
            $artisan = new MakeObserverCommand();
            $artisan->name($lens->name());
            $artisan->handle();
        }
    }
}
