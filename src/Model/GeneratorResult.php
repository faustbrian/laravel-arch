<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Model;

use Illuminate\Contracts\Support\Arrayable;

final class GeneratorResult implements Arrayable
{
    public function __construct(
        private readonly array $created = [],
        private readonly array $deleted = [],
        private readonly array $updated = [],
    ) {}

    public function created(): array
    {
        return $this->created;
    }

    public function deleted(): array
    {
        return $this->deleted;
    }

    public function updated(): array
    {
        return $this->updated;
    }

    public function toArray(): array
    {
        return [
            'created' => $this->created,
            'deleted' => $this->deleted,
            'updated' => $this->updated,
        ];
    }
}
