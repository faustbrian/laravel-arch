<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Laravel\Nova;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class LensGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Nova\Lens
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
