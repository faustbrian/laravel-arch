<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Tokenizer\Laravel\Nova;

use BombenProdukt\Arch\Model\Nova\Action;
use BombenProdukt\Arch\Tokenizer\AbstractTokenizer;
use Illuminate\Support\Arr;

final readonly class ActionTokenizer extends AbstractTokenizer
{
    public function tokenize(array $tokens): array
    {
        if (empty(Arr::get($tokens, 'nova.actions'))) {
            return [];
        }

        $actions = [];

        foreach (Arr::get($tokens, 'nova.actions') as $key => $value) {
            if (\is_numeric($key)) {
                $actions[] = new Action(name: $value);
            } else {
                $actions[] = new Action(
                    name: $key,
                    shouldBeDestructive: Arr::get($value, 'shouldBeDestructive', false),
                    shouldBeQueued: Arr::get($value, 'shouldBeQueued', false),
                );
            }
        }

        return [
            'nova' => [
                'actions' => $actions,
            ],
        ];
    }
}
