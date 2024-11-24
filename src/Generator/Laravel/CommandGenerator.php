<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Generator\Laravel;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class CommandGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /** @var \BaseCodeOy\Arch\Model\Command */
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
