<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\MakeCastCommand;
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
            $artisan = new MakeCastCommand();
            $artisan->name($cast->name());

            if ($cast->inbound()) {
                $artisan->inbound();
            }

            $artisan->force();

            $this->createFileFromCommand($artisan);
        }
    }
}
