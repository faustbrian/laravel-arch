<?php

declare(strict_types=1);

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
    protected static function getFacadeAccessor(): string
    {
        return TreeInterface::class;
    }
}
