<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\Nova\MakeCardCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class CardGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Nova\Card
         */
        foreach (Tree::get('nova.cards') as $card) {
            $artisan = new MakeCardCommand();
            $artisan->name($card->name());
            $artisan->handle();
        }
    }
}
