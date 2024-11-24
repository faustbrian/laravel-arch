<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Tokenizer\Livewire;

use BaseCodeOy\Arch\Model\Livewire;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;
use Illuminate\Support\Arr;

final readonly class ComponentTokenizer extends AbstractTokenizer
{
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['livewire'])) {
            return [];
        }

        $components = [];

        foreach ($tokens['livewire'] as $key => $value) {
            $components[] = $this->populateMetadata(
                new Livewire(
                    name: \is_numeric($key) ? $value : $key,
                    view: Arr::get($value, 'view'),
                    inline: Arr::get($value, 'inline', false),
                ),
                $value,
            );
        }

        return [
            'livewire' => [
                'components' => $components,
            ],
        ];
    }
}
