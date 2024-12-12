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

final class ObserverGenerator extends AbstractGenerator
{
    #[\Override()]
    public function generate(): void
    {
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
