<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\MakeModelCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class ModelGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Model
         */
        foreach (Tree::get('models') as $model) {
            $artisan = new MakeModelCommand();
            $artisan->name($model->name());
            $artisan->handle();
        }
    }
}
