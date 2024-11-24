<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Generator\Laravel;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

final class FormRequestGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /** @var \BaseCodeOy\Arch\Model\FormRequest */
        foreach (Tree::get('formRequests') as $formRequest) {
            $this->createFile(
                $formRequest->nameWithSuffix(),
                $this->renderClass($formRequest, 'laravel/form-request/form-request', [
                    'class' => $formRequest->nameWithSuffix(),
                    'rules' => Str::indent($this->rulesToString($formRequest->rules()) ?: '//', 12),
                ]),
            );
        }

        $this->persist();
    }

    private function rulesToString(array $rules): ?string
    {
        if (empty($rules)) {
            return null;
        }

        $result = [];

        foreach ($rules as $column => $rule) {
            if (\is_array($rule)) {
                $result[$column] = \implode('|', $rule);
            } else {
                $result[$column] = $rule;
            }
        }

        return Arr::propertiesToArrayItem($result);
    }
}
