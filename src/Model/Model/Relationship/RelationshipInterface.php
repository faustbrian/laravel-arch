<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Model\Model\Relationship;

use Illuminate\Contracts\Support\Arrayable;

interface RelationshipInterface extends Arrayable
{
    public function identifier(): string;

    public function import(): string;

    public function relationship(): string;

    public function toArray(): array;
}
