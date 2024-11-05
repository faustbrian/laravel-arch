<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\FormRequest;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;
use Illuminate\Support\Arr;

final readonly class FormRequestTokenizer extends AbstractTokenizer
{
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
