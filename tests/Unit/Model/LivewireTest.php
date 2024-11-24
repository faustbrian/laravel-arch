<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Model;

use BaseCodeOy\Arch\Model\Livewire;

it('can create an instance', function (): void {
    $subject = new Livewire(
        name: 'name',
        view: 'view',
        inline: true,
    );

    expect($subject->name())->toBe('Name');
    expect($subject->nameWithSuffixForTest())->toBe('NameTest');
    expect($subject->nameWithSuffixForView())->toBe('name.blade');
    expect($subject->view())->toBe('view');
    expect($subject->inline())->toBeTrue();
});
