<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Laravel;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;
use Illuminate\Support\Str;

final class PolicyGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Policy
         */
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
