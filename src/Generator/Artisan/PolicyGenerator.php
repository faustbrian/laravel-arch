<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\MakePolicyCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class PolicyGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Policy
         */
        foreach (Tree::get('policies') as $policy) {
            $artisan = new MakePolicyCommand();
            $artisan->name($policy->nameWithSuffix());
            $artisan->model($policy->name());
            $artisan->handle();
        }
    }
}
