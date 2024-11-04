<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Contract;

use BaseCodeOy\Arch\Model\GeneratorResult;
use BaseCodeOy\Arch\Reporter\Report;

interface ReporterInterface
{
    public function encode(GeneratorResult $result): Report;

    public function decode(): GeneratorResult;

    public function exists(): bool;
}
