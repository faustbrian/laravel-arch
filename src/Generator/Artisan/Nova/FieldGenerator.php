<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\Nova\MakeFieldCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class FieldGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Nova\Field
         */
        foreach (Tree::get('casts') as $field) {
            $artisan = new MakeFieldCommand();
            $artisan->name($field->name());
            $artisan->handle();
        }
    }
}
