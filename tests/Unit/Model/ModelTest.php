<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Model;

use BaseCodeOy\Arch\Model\Model;

it('can create an instance', function (): void {
    $subject = new Model(
        name: 'name',
    );

    expect($subject->name())->toBe('Name');
    expect($subject->nameWithSuffixForFactory())->toBe('NameFactory');
    expect($subject->nameWithSuffixForTest())->toBe('NameTest');
    expect($subject->tablename())->toBe('names');
    expect($subject->columns())->toBe([]);
    expect($subject->indexes())->toBe([]);
    expect($subject->relationships())->toBe([]);
    expect($subject->belongsToMany())->toBe([]);
    expect($subject->morphedByMany())->toBe([]);
    expect($subject->casts())->toBe([]);
    expect($subject->globalScopes())->toBe([]);
    expect($subject->localScopes())->toBe([]);
});
