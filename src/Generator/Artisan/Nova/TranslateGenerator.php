<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\Nova\MakeTranslateCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class TranslateGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Nova\Translation
         */
        foreach (Tree::get('nova.translations') as $translation) {
            $artisan = new MakeTranslateCommand();
            $artisan->name($translation->name());
            $artisan->handle();
        }
    }
}
