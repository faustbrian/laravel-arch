<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Statement\Laravel;

use BaseCodeOy\Arch\Statement\Laravel\ResourceCollectionStatement;

it('can generate code', function (): void {
    $resourceCollectionStatement = new ResourceCollectionStatement('Post', 'posts');

    expect($resourceCollectionStatement->code())->toMatchSnapshot();
});
