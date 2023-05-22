<?php

declare(strict_types=1);

namespace Tests\Unit\Model;

use BombenProdukt\Arch\Model\Controller;

it('can create an instance', function (): void {
    $subject = new Controller(
        name: 'name',
        group: 'web',
        model: 'Post',
        parent: 'User',
        authorizeResource: true,
    );

    expect($subject->name())->toBe('Name');
    expect($subject->nameWithSuffix())->toBe('NameController');
    expect($subject->nameWithSuffixForTest())->toBe('NameControllerTest');
    expect($subject->nameWithSuffixForFormRequest())->toBe('PostRequest');
    expect($subject->nameWithSuffixForRoute())->toBe('names');
    expect($subject->group())->toBe('web');
    expect($subject->methods())->toBe([]);
    expect($subject->parentModel())->toBe('User');
    expect($subject->nestedModel())->toBe('Post');
    expect($subject->isNested())->toBeTrue();
    expect($subject->invokable())->toBeFalse();
    expect($subject->isApiResource())->toBeFalse();
    expect($subject->shouldIncludeModel())->toBeTrue();
    expect($subject->authorizeResource())->toBeTrue();
});
