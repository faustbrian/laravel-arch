<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Laravel;

use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;
use Illuminate\Support\Str;

final class PolicyGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Policy
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
