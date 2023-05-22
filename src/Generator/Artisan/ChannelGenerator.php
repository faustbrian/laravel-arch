<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\MakeChannelCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class ChannelGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Channel
         */
        foreach (Tree::get('channels') as $channel) {
            $artisan = new MakeChannelCommand();
            $artisan->name($channel->nameWithSuffix());
            $artisan->handle();
        }
    }
}
