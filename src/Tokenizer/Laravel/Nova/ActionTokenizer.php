<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Tokenizer\Laravel\Nova;

use BaseCodeOy\Arch\Model\Nova\Action;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;
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
