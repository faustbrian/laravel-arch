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

final class MiddlewareGenerator extends AbstractGenerator
{
    #[\Override()]
    public function generate(): void
    {
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
