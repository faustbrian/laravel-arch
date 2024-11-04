<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\MakeCommandCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class CommandGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Command
         */
        foreach (Tree::get('commands') as $command) {
            $artisan = new MakeCommandCommand();
            $artisan->name($command->name());
            $artisan->handle();
        }
    }
}
