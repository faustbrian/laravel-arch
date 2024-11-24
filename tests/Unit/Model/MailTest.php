<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Model;

use BaseCodeOy\Arch\Model\Mail;

it('can create an instance', function (): void {
    $subject = new Mail(
        name: 'name',
        subject: 'subject',
        view: 'view',
        shouldQueue: true,
        shouldBeMarkdown: true,
    );

    expect($subject->name())->toBe('Name');
    expect($subject->subject())->toBe('subject');
    expect($subject->view())->toBe('view');
    expect($subject->shouldQueue())->toBeTrue();
    expect($subject->shouldBeMarkdown())->toBeTrue();
});
