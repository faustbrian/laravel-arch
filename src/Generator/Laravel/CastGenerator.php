<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Laravel;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class CastGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Cast
         */
        foreach (Tree::get('casts') as $cast) {
            $this->createFile(
                $cast->name(),
                $this->renderClass($cast, $cast->inbound() ? 'laravel/cast/inbound' : 'laravel/cast/cast', [
                    'class' => $cast->name(),
                ]),
            );
        }

        $this->persist();
    }
}
