<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Renderer;

use BaseCodeOy\Arch\Renderer\BladeStringRenderer;

it('should render a string stub', function (): void {
    $result = (new BladeStringRenderer())->render('{{ $name }} ({{ $age }})', [
        'name' => 'John Doe',
        'age' => 30,
    ]);

    expect($result)->toMatchSnapshot();
});
