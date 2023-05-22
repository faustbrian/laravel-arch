<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Laravel;

use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class CastGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Cast
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
