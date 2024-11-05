<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Laravel;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;
use Illuminate\Support\Str;

final class ModelTestGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Model
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
