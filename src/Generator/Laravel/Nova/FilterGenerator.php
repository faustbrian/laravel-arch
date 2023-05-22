<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Laravel\Nova;

use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;
use BombenProdukt\Arch\Model\Nova\Filter;

final class FilterGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Nova\Filter
         */
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
