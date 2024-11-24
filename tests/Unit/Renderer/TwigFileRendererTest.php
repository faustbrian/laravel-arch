<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Renderer;

use BaseCodeOy\Arch\Renderer\TwigFileRenderer;
use Illuminate\Support\Facades\Config;

it('should render a file stub', function (): void {
    Config::set('arch.stub_path', __DIR__.'/stubs');

    $result = (new TwigFileRenderer())->render('hello', [
        'name' => 'John Doe',
        'age' => 30,
    ]);

    expect($result)->toMatchSnapshot();
});
