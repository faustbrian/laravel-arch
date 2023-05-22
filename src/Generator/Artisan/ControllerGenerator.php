<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\MakeControllerCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class ControllerGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Controller
         */
        foreach (Tree::get('controllers') as $controller) {
            $artisan = new MakeControllerCommand();
            $artisan->name($controller->name());

            if ($controller->api()) {
                $artisan->api();
            }

            if ($controller->creatable()) {
                $artisan->creatable();
            }

            if ($controller->invokable()) {
                $artisan->invokable();
            }

            if ($controller->resource()) {
                $artisan->resource();
            }

            if ($controller->singleton()) {
                $artisan->singleton();
            }

            $artisan->handle();
        }
    }
}
