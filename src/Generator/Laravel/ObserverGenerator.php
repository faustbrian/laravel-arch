<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Laravel;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;
use Illuminate\Support\Str;

final class ObserverGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Observer
         */
        foreach (Tree::get('observers') as $observer) {
            $this->addImport($observer, $namespacedModel = Str::modelNamespace($observer->name()));

            $this->createFile(
                $observer->nameWithSuffix(),
                $this->renderClass($observer, $observer->plain() ? 'laravel/observer/plain' : 'laravel/observer/observer', [
                    'class' => $observer->nameWithSuffix(),
                    'namespacedModel' => $namespacedModel,
                    'model' => Str::className($namespacedModel),
                    'modelVariable' => Str::classNameCamel($namespacedModel),
                ]),
            );
        }

        $this->persist();
    }
}
