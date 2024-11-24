<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\MakeMiddlewareCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class MiddlewareGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /** @var \BaseCodeOy\Arch\Model\Middleware */
        foreach (Tree::get('middleware') as $middleware) {
            $artisan = new MakeMiddlewareCommand();
            $artisan->name($middleware->name());
            $artisan->handle();
        }
    }
}
