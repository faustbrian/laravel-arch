<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Statement\Laravel;

use BaseCodeOy\Arch\Model\Property;
use BaseCodeOy\Arch\Statement\Laravel\MailStatement;

it('can generate code', function (): void {
    $mailStatement = new MailStatement('InvoiceMailable', 'user', [
        new Property('invoice'),
    ]);

    expect($mailStatement->code())->toMatchSnapshot();
});

it('can generate test code', function (): void {
    $mailStatement = new MailStatement('InvoiceMailable', 'user', [
        new Property('invoice'),
    ]);

    expect($mailStatement->test())->toMatchSnapshot();
});
