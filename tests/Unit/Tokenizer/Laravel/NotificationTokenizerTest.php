<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Tokenizer\Laravel;

use BaseCodeOy\Arch\Tokenizer\Laravel\NotificationTokenizer;

it('returns an empty array when no notifications are provided', function (): void {
    $tokenizer = new NotificationTokenizer();

    $tokens = [];
    $result = $tokenizer->tokenize($tokens);

    expect($result)->toBeArray();
    expect($result)->toBeEmpty();
});

it('returns populated notifications when notifications are provided', function (): void {
    $tokenizer = new NotificationTokenizer();

    $tokens = [
        'notifications' => [
            'UserRegistered' => [
                'view' => 'emails.user_registered',
                'shouldQueue' => true,
                'shouldBeMarkdown' => true,
            ],
            'PasswordReset' => [
                'view' => 'emails.password_reset',
                'shouldQueue' => false,
                'shouldBeMarkdown' => false,
            ],
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['notifications'][0]->name())->toBe('UserRegistered');
    expect($result['notifications'][0]->view())->toBe('emails.user_registered');
    expect($result['notifications'][0]->shouldQueue())->toBe(true);
    expect($result['notifications'][0]->shouldBeMarkdown())->toBe(true);

    expect($result['notifications'][1]->name())->toBe('PasswordReset');
    expect($result['notifications'][1]->view())->toBe('emails.password_reset');
    expect($result['notifications'][1]->shouldQueue())->toBe(false);
    expect($result['notifications'][1]->shouldBeMarkdown())->toBe(false);
});
