<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Contract;

interface TreeInterface
{
    public function add(string $type, ModelInterface $model, bool $replaceOnConflict): void;

    public function get(string $type): array;

    public function flush(): void;

    public function merge(array $tokens, bool $replaceOnConflict): self;
}
