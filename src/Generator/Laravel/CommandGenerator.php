<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Laravel;

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
            $this->createFile(
                $command->name(),
                $this->renderClass($command, 'laravel/console/command', [
                    'class' => $command->name(),
                    'signature' => $command->signature(),
                    'description' => $command->description(),
                ]),
            );
        }
    }
}
