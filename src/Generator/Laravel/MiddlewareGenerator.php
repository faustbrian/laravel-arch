<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Laravel;

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
            $this->createFile(
                $middleware->name(),
                $this->renderClass($middleware, 'laravel/middleware/middleware', [
                    'class' => $middleware->name(),
                ]),
            );
        }

        $this->persist();
    }
}
