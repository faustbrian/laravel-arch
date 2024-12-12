<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\Job;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;
use Illuminate\Support\Arr;

final readonly class JobTokenizer extends AbstractTokenizer
{
    #[\Override()]
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
