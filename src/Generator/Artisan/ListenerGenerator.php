<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\MakeListenerCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class ListenerGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Listener
         */
        foreach (Tree::get('listeners') as $listener) {
            $artisan = new MakeListenerCommand();
            $artisan->name($listener->name());
            $artisan->handle();
        }
    }
}
