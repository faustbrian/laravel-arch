<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Tree;

use BaseCodeOy\Arch\Model\Cast;
use BaseCodeOy\Arch\Tree\ArrayTree;

it('can add items and flush all of them', function (): void {
    $tree = new ArrayTree();

    expect($tree->get('casts'))->toHaveCount(0);

    $tree->add('casts', new Cast('name1'));

    expect($tree->get('casts'))->toHaveCount(1);

    $tree->add('casts', new Cast('name2'));

    expect($tree->get('casts'))->toHaveCount(2);

    $tree->flush();

    expect($tree->get('casts'))->toHaveCount(0);
});

it('can add items and overwrite them', function (): void {
    $tree = new ArrayTree();

    expect($tree->get('casts'))->toHaveCount(0);

    $tree->add('casts', new Cast('name'));

    expect($tree->get('casts'))->toHaveCount(1);

    $tree->add('casts', new Cast('name'), replaceOnConflict: true);

    expect($tree->get('casts'))->toHaveCount(1);

    $tree->add('casts', new Cast('name'));

    expect($tree->get('casts'))->toHaveCount(2);
});
