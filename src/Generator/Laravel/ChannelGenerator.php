<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Laravel;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;
use Illuminate\Support\Str;

final class ChannelGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Channel
         */
        foreach (Tree::get('channels') as $channel) {
            $this->createFile(
                $channel->nameWithSuffix(),
                $this->renderClass($channel, 'laravel/channel/channel', [
                    'class' => $channel->nameWithSuffix(),
                    'namespacedUserModel' => Str::modelNamespace($userModel = 'User'),
                    'userModel' => $userModel,
                ]),
            );
        }

        $this->persist();
    }
}
