<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Contract;

use BaseCodeOy\Arch\Model\GeneratorResult;
use BaseCodeOy\Arch\Reporter\Report;

interface ReporterInterface
{
    public function encode(GeneratorResult $result): Report;

    public function decode(): GeneratorResult;

    public function exists(): bool;
}
