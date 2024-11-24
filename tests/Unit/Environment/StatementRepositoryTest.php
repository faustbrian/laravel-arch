<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Environment;

use BaseCodeOy\Arch\Environment\StatementRepository;

it('returns all statements', function (): void {
    $statementRepository = new StatementRepository();

    $statementRepository->add([
        'methods' => ['render'],
        'fullyQualifiedClassName' => \BaseCodeOy\Arch\Statement\Inertia\RenderStatement::class,
    ]);

    $statementRepository->add([
        'methods' => ['view'],
        'fullyQualifiedClassName' => \BaseCodeOy\Arch\Statement\Laravel\ViewStatement::class,
    ]);

    expect($statementRepository->all())->toBeArray();
    expect($statementRepository->all())->toHaveCount(2);
});

it('finds statements by method', function (): void {
    $statementRepository = new StatementRepository();

    $statementRepository->add([
        'methods' => ['render'],
        'fullyQualifiedClassName' => \BaseCodeOy\Arch\Statement\Inertia\RenderStatement::class,
    ]);

    $statementRepository->add([
        'methods' => ['view'],
        'fullyQualifiedClassName' => \BaseCodeOy\Arch\Statement\Laravel\ViewStatement::class,
    ]);

    expect($statementRepository->findByMethod('dispatch'))->toBeArray();
    expect($statementRepository->findByMethod('dispatch'))->toHaveCount(0);
    expect($statementRepository->findByMethod('render'))->toBeArray();
    expect($statementRepository->findByMethod('render'))->toHaveCount(1);
    expect($statementRepository->findByMethod('view'))->toBeArray();
    expect($statementRepository->findByMethod('view'))->toHaveCount(1);
});
