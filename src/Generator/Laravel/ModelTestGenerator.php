<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Laravel;

use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;
use Illuminate\Support\Str;

final class ModelTestGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Model
         */
        foreach (Tree::get('models') as $model) {
            $this->createFile(
                $model->nameWithSuffixForTest(),
                $this->renderClass($model, 'laravel/model/test/model', [
                    'class' => $model->name(),
                    'namespacedModel' => Str::modelNamespace($model->name()),
                ]),
            );
        }

        $this->persist();
    }
}
