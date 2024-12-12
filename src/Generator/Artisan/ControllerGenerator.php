<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\MakeControllerCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class ControllerGenerator extends AbstractGenerator
{
    #[\Override()]
    public function generate(): void
    {
        foreach (Tree::get('controllers') as $controller) {
            $artisan = new MakeControllerCommand();
            $artisan->name($controller->name());

            if ($controller->api()) {
                $artisan->api();
            }

            if ($controller->creatable()) {
                $artisan->creatable();
            }

            if ($controller->invokable()) {
                $artisan->invokable();
            }

            if ($controller->resource()) {
                $artisan->resource();
            }

            if ($controller->singleton()) {
                $artisan->singleton();
            }

            $artisan->handle();
        }
    }
}
