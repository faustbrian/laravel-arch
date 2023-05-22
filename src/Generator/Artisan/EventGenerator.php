<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\MakeEventCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class EventGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Event
         */
        foreach (Tree::get('events') as $event) {
            $artisan = new MakeEventCommand();
            $artisan->name($event->name());
            $artisan->handle();
        }
    }
}
