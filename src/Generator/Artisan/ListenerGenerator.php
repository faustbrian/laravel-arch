<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\MakeListenerCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class ListenerGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Listener
         */
        foreach (Tree::get('listeners') as $listener) {
            $artisan = new MakeListenerCommand();
            $artisan->name($listener->name());
            $artisan->handle();
        }
    }
}
