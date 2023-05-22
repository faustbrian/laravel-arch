<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Laravel\Nova;

use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;
use BombenProdukt\Arch\Model\Nova\Metric;

final class MetricGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Nova\Metric
         */
        foreach (Tree::get('nova.metrics') as $metric) {
            $this->createFile(
                $metric->name(),
                $this->renderClass($metric, $this->stub($metric), [
                    'class' => $metric->name(),
                ]),
            );
        }

        $this->persist();
    }

    protected function accessor(): string
    {
        return 'nova.metrics';
    }

    private function stub(Metric $metric): string
    {
        return match ($metric->type()) {
            'partition' => 'laravel/nova/metric/partition',
            'progress' => 'laravel/nova/metric/progress',
            'table' => 'laravel/nova/metric/table',
            'trend' => 'laravel/nova/metric/trend',
            'value' => 'laravel/nova/metric/value',
            default => throw new \InvalidArgumentException('Unknown metric type: '.$metric->type()),
        };
    }
}
