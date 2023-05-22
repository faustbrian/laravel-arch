<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Laravel;

use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class MiddlewareGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Middleware
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
