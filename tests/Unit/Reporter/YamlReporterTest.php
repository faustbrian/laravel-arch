<?php

declare(strict_types=1);

use BaseCodeOy\Arch\Model\GeneratorResult;
use BaseCodeOy\Arch\Path;
use BaseCodeOy\Arch\Reporter\Report;
use BaseCodeOy\Arch\Reporter\YamlReporter;
use Illuminate\Support\Facades\File;

beforeEach(function (): void {
    File::shouldReceive('put')
        ->withSomeOfArgs(Path::arch('report.yaml'))
        ->andReturn(true);

    $this->generatorResult = new GeneratorResult(
        created: ['created'],
        deleted: ['deleted'],
        updated: ['updated'],
    );

    $this->reporter = new YamlReporter();
});

it('encodes the result', function (): void {
    $actual = $this->reporter->encode($this->generatorResult);

    expect($actual)->toBeInstanceOf(Report::class);
    expect($actual->path())->toBeString();
    expect($actual->contents())->toBeString();
});

it('decodes the report', function (): void {
    $encoded = $this->reporter->encode($this->generatorResult);

    File::shouldReceive('get')
        ->with($encoded->path())
        ->andReturn($encoded->contents());

    $decoded = $this->reporter->decode($encoded->path());

    expect($decoded)->toBeInstanceOf(GeneratorResult::class);
    expect($decoded->created())->toEqual($this->generatorResult->created());
    expect($decoded->deleted())->toEqual($this->generatorResult->deleted());
    expect($decoded->updated())->toEqual($this->generatorResult->updated());
});
