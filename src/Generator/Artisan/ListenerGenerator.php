<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\MakeListenerCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class ListenerGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /** @var \BaseCodeOy\Arch\Model\Listener */
        foreach (Tree::get('listeners') as $listener) {
            $artisan = new MakeListenerCommand();
            $artisan->name($listener->name());
            $artisan->handle();
        }
    }
}
