<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\Channel;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;

final readonly class ChannelTokenizer extends AbstractTokenizer
{
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['channels'])) {
            return [];
        }

        $channels = [];

        foreach ($tokens['channels'] as $key => $value) {
            $channels[] = $this->populateMetadata(
                new Channel(name: \is_numeric($key) ? $value : $key),
                $value,
            );
        }

        return [
            'channels' => $channels,
        ];
    }
}
