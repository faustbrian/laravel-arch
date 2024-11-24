<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Generator\Laravel\Nova;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;
use BaseCodeOy\Arch\Model\Nova\Filter;

final class FilterGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /** @var Filter */
        foreach (Tree::get('nova.filters') as $filter) {
            $this->createFile(
                $filter->name(),
                $this->renderClass($filter, $this->stub($filter), [
                    'class' => $filter->name(),
                ]),
            );
        }

        $this->persist();
    }

    protected function accessor(): string
    {
        return 'nova.filters';
    }

    private function stub(Filter $filter): string
    {
        return match ($filter->type()) {
            'boolean' => 'laravel/nova/filter/boolean',
            'date' => 'laravel/nova/filter/date',
            default => 'laravel/nova/filter/filter',
        };
    }
}
