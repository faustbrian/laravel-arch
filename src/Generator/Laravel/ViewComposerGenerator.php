<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Laravel;

use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class ViewComposerGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\ViewComposer
         */
        foreach (Tree::get('viewComposers') as $composer) {
            $this->createFile(
                $composer->nameWithSuffix(),
                $this->renderClass($composer, 'laravel/view/composer', [
                    'class' => $composer->nameWithSuffix(),
                ]),
            );
        }

        $this->persist();
    }
}
