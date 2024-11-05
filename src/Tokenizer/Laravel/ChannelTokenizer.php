<?php

declare(strict_types=1);

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
