<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\Event;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;
use Illuminate\Support\Arr;

final readonly class EventTokenizer extends AbstractTokenizer
{
    #[\Override()]
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['events'])) {
            return [];
        }

        $events = [];

        foreach ($tokens['events'] as $key => $value) {
            $events[] = $this->populateMetadata(
                new Event(
                    name: \is_numeric($key) ? $value : $key,
                    shouldBroadcast: Arr::get($value, 'shouldBroadcast', false),
                ),
                $value,
            );
        }

        return [
            'events' => $events,
        ];
    }
}
