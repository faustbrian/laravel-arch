<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Laravel;

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
