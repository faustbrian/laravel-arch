<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\FormRequest;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;
use Illuminate\Support\Arr;

final readonly class FormRequestTokenizer extends AbstractTokenizer
{
    #[\Override()]
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['formRequests'])) {
            return [];
        }

        $formRequests = [];

        foreach ($tokens['formRequests'] as $key => $value) {
            if (\is_numeric($key)) {
                $formRequest = new FormRequest(name: $value);
            } else {
                $formRequest = new FormRequest(
                    name: $key,
                    rules: Arr::get($value, 'rules', []),
                );
            }

            $formRequests[] = $this->populateMetadata($formRequest, $value);
        }

        return [
            'formRequests' => $formRequests,
        ];
    }
}
