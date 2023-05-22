<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Tree;

use BombenProdukt\Arch\Contract\ModelInterface;
use BombenProdukt\Arch\Contract\TreeInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\ForwardsCalls;

final class ArrayTree implements TreeInterface
{
    use ForwardsCalls;

    private array $tree = [];

    public function add(string $type, ModelInterface $model, bool $replaceOnConflict = false): void
    {
        if (!Arr::has($this->tree, $type)) {
            Arr::set($this->tree, $type, []);
        }

        foreach ($this->get($type) as $key => $value) {
            if ($value->name() === $model->name()) {
                if ($replaceOnConflict) {
                    Arr::forget($this->tree[$type], $key);
                }
            }
        }

        $this->tree[$type][] = $model;
    }

    public function get(string $type): array
    {
        return Arr::get($this->tree, $type, []);
    }

    public function flush(): void
    {
        $this->tree = [];
    }

    public function merge(array $tokens, bool $replaceOnConflict = false): self
    {
        foreach ($tokens as $type => $models) {
            foreach ($models as $modelType => $model) {
                // This handles nested definitions like nova.metrics to avoid keys like novaMetrics
                if (\is_array($model)) {
                    foreach ($model as $subModel) {
                        $this->add("{$type}.{$modelType}", $subModel, $replaceOnConflict);
                    }
                } else {
                    $this->add($type, $model, $replaceOnConflict);
                }
            }
        }

        return $this;
    }
}
