<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Tokenizer\Laravel\Nova;

use BombenProdukt\Arch\Model\Nova\Dashboard;
use BombenProdukt\Arch\Tokenizer\AbstractTokenizer;
use Illuminate\Support\Arr;

final readonly class DashboardTokenizer extends AbstractTokenizer
{
    public function tokenize(array $tokens): array
    {
        if (empty(Arr::get($tokens, 'nova.dashboards'))) {
            return [];
        }

        $dashboards = [];

        foreach (Arr::get($tokens, 'nova.dashboards') as $name) {
            $dashboards[] = new Dashboard(name: $name);
        }

        return [
            'nova' => [
                'dashboards' => $dashboards,
            ],
        ];
    }
}
