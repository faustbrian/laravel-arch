<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\Observer;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;
use Illuminate\Support\Arr;

final readonly class ObserverTokenizer extends AbstractTokenizer
{
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['observers'])) {
            return [];
        }

        $observers = [];

        foreach ($tokens['observers'] as $key => $value) {
            $observers[] = $this->populateMetadata(
                new Observer(
                    name: \is_numeric($key) ? $value : $key,
                    plain: Arr::get($value, 'plain', false),
                ),
                $value,
            );
        }

        return [
            'observers' => $observers,
        ];
    }
}
