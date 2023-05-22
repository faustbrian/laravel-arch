<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Laravel;

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
            $this->createFile(
                $rule->name(),
                $this->renderClass($rule, 'laravel/rule/rule', [
                    'class' => $rule->name(),
                ]),
            );
        }

        $this->persist();
    }
}
