<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Contract;

use BaseCodeOy\Arch\Model\GeneratorResult;

interface GeneratorInterface
{
    public function generate(): void;

    public function result(): GeneratorResult;
}
