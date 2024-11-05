<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\MakeObserverCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class ObserverGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Observer
         */
        foreach (Tree::get('observers') as $observer) {
            $artisan = new MakeObserverCommand();
            $artisan->name($observer->nameWithSuffix());
            $artisan->model($observer->name());
            $artisan->handle();
        }
    }
}
