<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Contract;

use BaseCodeOy\Arch\Model\GeneratorResult;

interface GeneratorInterface
{
    public function generate(): void;

    public function result(): GeneratorResult;
}
