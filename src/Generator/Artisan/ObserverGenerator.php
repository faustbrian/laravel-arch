<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\MakeObserverCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class ObserverGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Observer
         */
        foreach (Tree::get('observers') as $observer) {
            $artisan = new MakeObserverCommand();
            $artisan->name($observer->nameWithSuffix());
            $artisan->model($observer->name());
            $artisan->handle();
        }
    }
}
