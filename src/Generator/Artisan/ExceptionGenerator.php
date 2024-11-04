<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\MakeExceptionCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class ExceptionGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Exception
         */
        foreach (Tree::get('exceptions') as $exception) {
            $artisan = new MakeExceptionCommand();
            $artisan->name($exception->name());
            $artisan->handle();
        }
    }
}
