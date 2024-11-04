<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\MakePolicyCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class PolicyGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Policy
         */
        foreach (Tree::get('policies') as $policy) {
            $artisan = new MakePolicyCommand();
            $artisan->name($policy->nameWithSuffix());
            $artisan->model($policy->name());
            $artisan->handle();
        }
    }
}
