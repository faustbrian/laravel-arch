<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Laravel\Nova;

use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class LensGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Nova\Lens
         */
        foreach (Tree::get('nova.lenses') as $lens) {
            $this->createFile(
                $lens->name(),
                $this->renderClass($lens, 'laravel/nova/lens', [
                    'class' => $lens->name(),
                ]),
            );
        }

        $this->persist();
    }

    protected function accessor(): string
    {
        return 'nova.lenses';
    }
}
