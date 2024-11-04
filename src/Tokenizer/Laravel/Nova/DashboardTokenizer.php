<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Tokenizer\Laravel\Nova;

use BaseCodeOy\Arch\Model\Nova\Dashboard;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;
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
