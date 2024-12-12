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
use Illuminate\Support\Str;

final class PolicyGenerator extends AbstractGenerator
{
    #[\Override()]
    public function generate(): void
    {
        foreach (Tree::get('policies') as $policy) {
            $this->addImport($policy, $namespacedModel = Str::modelNamespace($policy->name()));
            $this->addImport($policy, $namespacedUserModel = Str::modelNamespace('User'));

            $this->createFile(
                $policy->nameWithSuffix(),
                $this->renderClass($policy, $policy->plain() ? 'laravel/policy/plain' : 'laravel/policy/policy', [
                    'namespacedModel' => $namespacedModel,
                    'namespacedUserModel' => $namespacedUserModel,
                    'class' => $policy->nameWithSuffix(),
                    'user' => Str::className($namespacedUserModel),
                    'model' => Str::className($namespacedModel),
                    'modelVariable' => Str::classNameCamel($namespacedModel),
                ]),
            );
        }

        $this->persist();
    }
}
