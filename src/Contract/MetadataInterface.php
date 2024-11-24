<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Contract;

interface MetadataInterface
{
    public function metadata(): array;

    public function getMetadata(string $key, mixed $defaultValue = null): mixed;

    public function setMetadata(string $key, mixed $value): void;

    public function hasMetadata(string $key): bool;

    public function missingMetadata(string $key): bool;

    public function forgetMetadata(string $key): void;

    public function flushMetadata(): void;

    public function mergeMetadata(array $metadata): void;

    public function replaceMetadata(array $metadata): void;
}
