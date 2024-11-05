<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Laravel;

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
