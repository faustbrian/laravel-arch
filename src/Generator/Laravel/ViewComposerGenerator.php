<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Laravel;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class ViewComposerGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\ViewComposer
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
