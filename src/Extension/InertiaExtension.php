<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Extension;

use BaseCodeOy\Arch\Contract\ExtensionInterface;
use BaseCodeOy\Arch\Facade\Environment;

final readonly class InertiaExtension implements ExtensionInterface
{
    public function register(array $configuration): void
    {
        foreach ($configuration['statements'] as $statement) {
            Environment::statements()->add($statement);
        }
    }
}
