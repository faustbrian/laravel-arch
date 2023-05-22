<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Tokenizer\Laravel\Nova;

use BombenProdukt\Arch\Model\Nova\Metric;
use BombenProdukt\Arch\Tokenizer\AbstractTokenizer;
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
