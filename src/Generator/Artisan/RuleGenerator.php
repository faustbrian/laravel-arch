<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\MakeRuleCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class RuleGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Rule
         */
        foreach (Tree::get('rules') as $rule) {
            $artisan = new MakeRuleCommand();
            $artisan->name($rule->name());
            $artisan->handle();
        }
    }
}
