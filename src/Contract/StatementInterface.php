<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Contract;

interface StatementInterface
{
    public function code(array $context = []): string;

    public function test(array $context = []): string;

    public function imports(array $context = []): array;

    public function traits(array $context = []): array;
}
