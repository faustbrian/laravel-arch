<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Generator\Laravel;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;
use Illuminate\Support\Str;

final class ChannelGenerator extends AbstractGenerator
{
    #[\Override()]
    public function generate(): void
    {
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
