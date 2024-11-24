<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Model;

use BaseCodeOy\Arch\Model\ViewComposer;

it('can create an instance', function (): void {
    $subject = new ViewComposer(
        name: 'name',
    );

    expect($subject->name())->toBe('Name');
    expect($subject->nameWithSuffix())->toBe('nameComposer');
});
