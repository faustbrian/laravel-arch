<?php

declare(strict_types=1);

namespace Tests\Unit\Model;

use BombenProdukt\Arch\Model\Livewire;

it('can create an instance', function (): void {
    $subject = new Livewire(
        name: 'name',
        view: 'view',
        inline: true,
    );

    expect($subject->name())->toBe('Name');
    expect($subject->nameWithSuffixForTest())->toBe('NameTest');
    expect($subject->nameWithSuffixForView())->toBe('name.blade');
    expect($subject->view())->toBe('view');
    expect($subject->inline())->toBeTrue();
});
