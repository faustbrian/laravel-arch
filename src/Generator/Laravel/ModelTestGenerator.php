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

final class ModelTestGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /** @var \BaseCodeOy\Arch\Model\Model */
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
