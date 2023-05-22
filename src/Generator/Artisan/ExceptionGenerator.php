<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\MakeExceptionCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class ExceptionGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Exception
         */
        foreach (Tree::get('exceptions') as $exception) {
            $artisan = new MakeExceptionCommand();
            $artisan->name($exception->name());
            $artisan->handle();
        }
    }
}
