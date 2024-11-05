<?php

declare(strict_types=1);

namespace Tests\Unit\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\Model;
use BaseCodeOy\Arch\Tokenizer\Laravel\ModelTokenizer;
use Symfony\Component\Yaml\Yaml;
use function Spatie\Snapshots\assertMatchesSnapshot;

it('tokenizes an empty array', function (): void {
    $tokenizer = new ModelTokenizer();

    $tokens = [];
    $actual = $tokenizer->tokenize($tokens);

    expect($actual)->toBeArray();
    expect($actual)->toBeEmpty();
});

it('tokenizes the models', function (): void {
    $actual = (new ModelTokenizer())->tokenize(Yaml::parseFile('tests/Fixtures/Configuration/model.yaml')['definitions']);

    expect($actual)->toBeArray();
    expect($actual['models']['Post'])->toBeInstanceOf(Model::class);
    expect($actual['models']['Comment'])->toBeInstanceOf(Model::class);
});

it('tokenizes the relationships when specified as strings', function (): void {
    $actual = (new ModelTokenizer())->tokenize(Yaml::parseFile('tests/Fixtures/Manifest/model/shorthand-relationships.yaml')['definitions']);

    expect($actual)->toBeArray();
    assertMatchesSnapshot($actual['models']['Post']->relationships()['hasMany'][0]->toArray());
    assertMatchesSnapshot($actual['models']['Comment']->relationships()['hasMany'][0]->toArray());
    assertMatchesSnapshot($actual['models']['Comment']->relationships()['hasManyThrough'][0]->toArray());
    assertMatchesSnapshot($actual['models']['Comment']->relationships()['hasOneThrough'][0]->toArray());
    assertMatchesSnapshot($actual['models']['Comment']->relationships()['belongsToMany'][0]->toArray());
    assertMatchesSnapshot($actual['models']['Comment']->relationships()['hasOne'][0]->toArray());
    assertMatchesSnapshot($actual['models']['Comment']->relationships()['belongsTo'][0]->toArray());
    assertMatchesSnapshot($actual['models']['Comment']->relationships()['morphOne'][0]->toArray());
    assertMatchesSnapshot($actual['models']['Comment']->relationships()['morphTo'][0]->toArray());
    assertMatchesSnapshot($actual['models']['Comment']->relationships()['morphMany'][0]->toArray());
    assertMatchesSnapshot($actual['models']['Comment']->relationships()['morphToMany'][0]->toArray());
});
