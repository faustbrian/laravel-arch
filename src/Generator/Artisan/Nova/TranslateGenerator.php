<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\Nova\MakeTranslateCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class TranslateGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Nova\Translation
         */
        foreach (Tree::get('nova.translations') as $translation) {
            $artisan = new MakeTranslateCommand();
            $artisan->name($translation->name());
            $artisan->handle();
        }
    }
}
