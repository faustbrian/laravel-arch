<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use BaseCodeOy\Arch\Model\Model\GlobalScope;

it('can create an instance', function (): void {
    $subject = new GlobalScope('Ancient');

    expect($subject->name())->toBe('Ancient');
});
