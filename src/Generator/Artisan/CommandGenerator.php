<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\MakeCommandCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class CommandGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Command
         */
        foreach (Tree::get('commands') as $command) {
            $artisan = new MakeCommandCommand();
            $artisan->name($command->name());
            $artisan->handle();
        }
    }
}
