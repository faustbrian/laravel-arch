<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Tokenizer\Laravel;

use BombenProdukt\Arch\Model\Notification;
use BombenProdukt\Arch\Tokenizer\AbstractTokenizer;
use Illuminate\Support\Arr;

final readonly class NotificationTokenizer extends AbstractTokenizer
{
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['notifications'])) {
            return [];
        }

        $notifications = [];

        foreach ($tokens['notifications'] as $key => $value) {
            $notifications[] = $this->populateMetadata(
                new Notification(
                    name: \is_numeric($key) ? $value : $key,
                    view: Arr::get($value, 'view'),
                    shouldQueue: Arr::get($value, 'shouldQueue', false),
                    shouldBeMarkdown: Arr::get($value, 'shouldBeMarkdown', false),
                ),
                $value,
            );
        }

        return [
            'notifications' => $notifications,
        ];
    }
}
