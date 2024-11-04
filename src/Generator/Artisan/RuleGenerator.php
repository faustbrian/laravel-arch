<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\MakeRuleCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class RuleGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Rule
         */
        foreach (Tree::get('rules') as $rule) {
            $artisan = new MakeRuleCommand();
            $artisan->name($rule->name());
            $artisan->handle();
        }
    }
}
