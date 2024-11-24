<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Tokenizer\Laravel\Nova;

use BaseCodeOy\Arch\Model\Nova\Metric;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;
use Illuminate\Support\Arr;

final readonly class MetricTokenizer extends AbstractTokenizer
{
    public function tokenize(array $tokens): array
    {
        if (empty(Arr::get($tokens, 'nova.metrics'))) {
            return [];
        }

        $metrics = [];

        foreach (Arr::get($tokens, 'nova.metrics') as $name => $value) {
            $metrics[] = new Metric(
                name: $name,
                type: $value['type'],
            );
        }

        return [
            'nova' => [
                'metrics' => $metrics,
            ],
        ];
    }
}
