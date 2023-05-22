<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\MakeRequestCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class RequestGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\FormRequest
         */
        foreach (Tree::get('formRequests') as $formRequest) {
            $artisan = new MakeRequestCommand();
            $artisan->name($formRequest->nameWithSuffix());
            $artisan->handle();
        }
    }
}
