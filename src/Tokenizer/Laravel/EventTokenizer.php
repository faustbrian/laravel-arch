<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\Event;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;
use Illuminate\Support\Arr;

final readonly class EventTokenizer extends AbstractTokenizer
{
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
