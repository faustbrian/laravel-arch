<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Contract;

interface TreeInterface
{
    public function add(string $type, ModelInterface $model, bool $replaceOnConflict): void;

    public function get(string $type): array;

    public function flush(): void;

    public function merge(array $tokens, bool $replaceOnConflict): self;
}
