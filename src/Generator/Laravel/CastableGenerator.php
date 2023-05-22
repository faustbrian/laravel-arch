<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Laravel;

use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class CastableGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Castable
         */
        foreach (Tree::get('castables') as $castable) {
            $this->createFile(
                $castable->name(),
                $this->renderClass($castable, $castable->castsAttributes() ? 'laravel/castable/casts-attributes' : 'laravel/castable/castable', [
                    'class' => $castable->name(),
                ]),
            );
        }

        $this->persist();
    }
}
