<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\Nova\MakeCardCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class CardGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Nova\Card
         */
        foreach (Tree::get('nova.cards') as $card) {
            $artisan = new MakeCardCommand();
            $artisan->name($card->name());
            $artisan->handle();
        }
    }
}
