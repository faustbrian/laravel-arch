<?php

declare(strict_types=1);

namespace Tests\Unit\Tree;

use BombenProdukt\Arch\Model\Cast;
use BombenProdukt\Arch\Tree\ArrayTree;

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
