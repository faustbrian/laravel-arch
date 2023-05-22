<?php

declare(strict_types=1);

namespace Tests\Unit\Tokenizer\Laravel;

use BombenProdukt\Arch\Tokenizer\Laravel\MailTokenizer;

it('returns an empty array when no mails are provided', function (): void {
    $tokenizer = new MailTokenizer();

    $tokens = [];
    $result = $tokenizer->tokenize($tokens);

    expect($result)->toBeArray();
    expect($result)->toBeEmpty();
});

it('returns populated mails when mails are provided', function (): void {
    $tokenizer = new MailTokenizer();

    $tokens = [
        'mails' => [
            'Something1' => [
                'subject' => 'Subject1',
                'view' => 'view1',
                'shouldQueue' => true,
                'shouldBeMarkdown' => false,
            ],
            'Something2' => [
                'subject' => 'Subject2',
                'view' => 'view2',
                'shouldQueue' => false,
                'shouldBeMarkdown' => true,
            ],
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['mails'][0]->name())->toBe('Something1');
    expect($result['mails'][0]->subject())->toBe('Subject1');
    expect($result['mails'][0]->view())->toBe('view1');
    expect($result['mails'][0]->shouldQueue())->toBeTrue();
    expect($result['mails'][0]->shouldBeMarkdown())->toBeFalse();

    expect($result['mails'][1]->name())->toBe('Something2');
    expect($result['mails'][1]->subject())->toBe('Subject2');
    expect($result['mails'][1]->view())->toBe('view2');
    expect($result['mails'][1]->shouldQueue())->toBeFalse();
    expect($result['mails'][1]->shouldBeMarkdown())->toBeTrue();
});
