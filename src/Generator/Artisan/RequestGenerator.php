<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\MakeRequestCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class RequestGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\FormRequest
         */
        foreach (Tree::get('formRequests') as $formRequest) {
            $artisan = new MakeRequestCommand();
            $artisan->name($formRequest->nameWithSuffix());
            $artisan->handle();
        }
    }
}
