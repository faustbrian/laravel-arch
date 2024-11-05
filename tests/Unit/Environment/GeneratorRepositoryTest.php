<?php

declare(strict_types=1);

namespace Tests\Unit\Environment;

use BaseCodeOy\Arch\Environment\Generator;
use BaseCodeOy\Arch\Environment\GeneratorRepository;

it('returns all generators', function (): void {
    $generatorRepository = new GeneratorRepository();

    $generator1 = ['casts', 'My\\Full\\Qualified\\Class\\Name1', 'My\\Namespace1', '/my/directory1'];
    $generator2 = ['castables', 'My\\Full\\Qualified\\Class\\Name2', 'My\\Namespace2', '/my/directory2'];

    $generatorRepository->add($generator1);
    $generatorRepository->add($generator2);

    expect($generatorRepository->all())->toBeArray()->and($generatorRepository->all())->toHaveCount(2);
});

it('adds a new generator', function (): void {
    $generatorRepository = new GeneratorRepository();

    $generator = ['casts', 'My\\Full\\Qualified\\Class\\Name', 'My\\Namespace', '/my/directory'];

    $generatorRepository->add($generator);

    expect($generatorRepository->all())->toBeArray()->and($generatorRepository->all())->toHaveCount(1);
});

it('finds a generator by accessor', function (): void {
    $generatorRepository = new GeneratorRepository();

    $generator1 = ['casts', 'My\\Full\\Qualified\\Class\\Name1', 'My\\Namespace1', '/my/directory1'];
    $generator2 = ['castables', 'My\\Full\\Qualified\\Class\\Name2', 'My\\Namespace2', '/my/directory2'];
    $generator3 = ['controllers', 'My\\Full\\Qualified\\Class\\Name3', 'My\\Namespace3', '/my/directory3'];

    $generatorRepository->add($generator1);
    $generatorRepository->add($generator2);
    $generatorRepository->add($generator3);

    expect($generatorRepository->findByAccessor('casts'))->toBeInstanceOf(Generator::class);
    expect($generatorRepository->findByAccessor('casts')->accessor())->toBe('casts');
    expect($generatorRepository->findByAccessor('castables')->accessor())->toBe('castables');
    expect($generatorRepository->findByAccessor('controllers')->accessor())->toBe('controllers');
});
