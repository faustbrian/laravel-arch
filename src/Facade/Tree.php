<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Facade;

use BaseCodeOy\Arch\Contract\ModelInterface;
use BaseCodeOy\Arch\Contract\TreeInterface;
use Illuminate\Support\Facades\Facade;

/**
 * @method static void          add(string $type, ModelInterface $model, bool $replaceOnConflict)
 * @method static void          flush()
 * @method static array         get(string $type)
 * @method static TreeInterface merge(array $tokens, bool $replaceOnConflict)
 */
final class Tree extends Facade
{
    #[\Override()]
    protected static function getFacadeAccessor(): string
    {
        return TreeInterface::class;
    }
}
