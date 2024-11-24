<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Statement\Laravel;

use BaseCodeOy\Arch\Model\Property;
use BaseCodeOy\Arch\Statement\Laravel\NotificationStatement;

it('can generate code', function (): void {
    $notificationStatement = new NotificationStatement('InvoicePaid', 'user', [
        new Property('invoice'),
    ]);

    expect($notificationStatement->code())->toMatchSnapshot();
});

it('can generate test code', function (): void {
    $notificationStatement = new NotificationStatement('InvoicePaid', 'user', [
        new Property('invoice'),
    ]);

    expect($notificationStatement->test())->toMatchSnapshot();
});
