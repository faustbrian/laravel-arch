<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Tokenizer\Laravel\Nova;

use BaseCodeOy\Arch\Model\Nova\Lens;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;
use Illuminate\Support\Arr;

final readonly class LensTokenizer extends AbstractTokenizer
{
    #[\Override()]
    public function tokenize(array $tokens): array
    {
        if (empty(Arr::get($tokens, 'nova.lenses'))) {
            return [];
        }

        $lenses = [];

        foreach (Arr::get($tokens, 'nova.lenses') as $name) {
            $lenses[] = new Lens(name: $name);
        }

        return [
            'nova' => [
                'lenses' => $lenses,
            ],
        ];
    }
}
