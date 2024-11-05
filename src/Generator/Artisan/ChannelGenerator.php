<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\MakeChannelCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class ChannelGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Channel
         */
        foreach (Tree::get('channels') as $channel) {
            $artisan = new MakeChannelCommand();
            $artisan->name($channel->nameWithSuffix());
            $artisan->handle();
        }
    }
}
