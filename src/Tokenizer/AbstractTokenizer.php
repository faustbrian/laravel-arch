<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Tokenizer;

use BaseCodeOy\Arch\Contract\ModelInterface;
use BaseCodeOy\Arch\Contract\TokenizerInterface;
use BaseCodeOy\Arch\Model\Property;
use Illuminate\Support\Arr;

abstract readonly class AbstractTokenizer implements TokenizerInterface
{
    public function __construct(
        protected array $configuration = [],
    ) {
        //
    }

    abstract public function tokenize(array $tokens): array;

    protected function configuration(string $key, mixed $defaultValue = null): mixed
    {
        return Arr::get($this->configuration, $key, $defaultValue);
    }

    protected function populateMetadata(ModelInterface $model, mixed $token): ModelInterface
    {
        if (empty($token['metadata'])) {
            return $model;
        }

        if (!\is_array($token['metadata'])) {
            return $model;
        }

        if (!empty($token['metadata']['constructor'])) {
            $constructor = [];

            foreach ($token['metadata']['constructor'] as $key => $value) {
                if (\is_array($value)) {
                    $constructor[] = new Property(
                        name: $key,
                        type: Arr::get($value, 'type', 'string'),
                        visibility: Arr::get($value, 'visibility', 'public'),
                        isReadonly: Arr::get($value, 'isReadonly', false),
                        isNullable: Arr::get($value, 'isNullable', false),
                        defaultValue: Arr::get($value, 'defaultValue'),
                    );
                } else {
                    $constructor[] = new Property(
                        name: $key,
                        type: $value,
                    );
                }
            }

            $model->setMetadata('constructor', $constructor);
        }

        return $model;
    }
}
