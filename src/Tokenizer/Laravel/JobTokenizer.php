<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Tokenizer\Laravel;

use BombenProdukt\Arch\Model\Job;
use BombenProdukt\Arch\Tokenizer\AbstractTokenizer;
use Illuminate\Support\Arr;

final readonly class JobTokenizer extends AbstractTokenizer
{
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['jobs'])) {
            return [];
        }

        $jobs = [];

        foreach ($tokens['jobs'] as $key => $value) {
            $jobs[] = $this->populateMetadata(
                new Job(
                    name: \is_numeric($key) ? $value : $key,
                    shouldQueue: Arr::get($value, 'shouldQueue', false),
                    shouldBeUnique: Arr::get($value, 'shouldBeUnique', false),
                ),
                $value,
            );
        }

        return [
            'jobs' => $jobs,
        ];
    }
}
