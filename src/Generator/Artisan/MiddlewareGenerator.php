<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\MakeMiddlewareCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class MiddlewareGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Middleware
         */
        foreach (Tree::get('middleware') as $middleware) {
            $artisan = new MakeMiddlewareCommand();
            $artisan->name($middleware->name());
            $artisan->handle();
        }
    }
}
