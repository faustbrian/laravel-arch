---
title: Nova Metrics
description: Learn how to generate Laravel Nova metrics
breadcrumbs: [Documentation, Generators, Nova, Metrics]
---

::: info
This page will describe how [Nova metrics](https://nova.laravel.com/docs/4.0/metrics/defining-metrics.html) can be generated.
:::

## Examples

### [Partition](https://nova.laravel.com/docs/4.0/metrics/defining-metrics.html#partition-metrics)

```yaml
arch: 1.0.0
definitions:
  novaMetrics:
    PartitionMetric: partition
```

### [Progress](https://nova.laravel.com/docs/4.0/metrics/defining-metrics.html#progress-metrics)

```yaml
arch: 1.0.0
definitions:
  novaMetrics:
    ProgressMetric: progress
```

### [Table](https://nova.laravel.com/docs/4.0/metrics/defining-metrics.html#table-metrics)

```yaml
arch: 1.0.0
definitions:
  novaMetrics:
    TableMetric: table
```

### [Trend](https://nova.laravel.com/docs/4.0/metrics/defining-metrics.html#trend-metrics)

```yaml
arch: 1.0.0
definitions:
  novaMetrics:
    TrendMetric: trend
```

### [Value](https://nova.laravel.com/docs/4.0/metrics/defining-metrics.html#value-metrics)

```yaml
arch: 1.0.0
definitions:
  novaMetrics:
    ValueMetric: value
```
