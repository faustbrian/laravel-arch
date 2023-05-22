<?php

declare(strict_types=1);

namespace Tests\Unit\Tokenizer;

use BombenProdukt\Arch\Tokenizer\Laravel\StatementTokenizer;
use Symfony\Component\Yaml\Yaml;
use function Spatie\Snapshots\assertMatchesSnapshot;

beforeEach(fn () => registerExtensions());

it('should parse the authorization statement', function (string $handler, string $method): void {
    $actual = (new StatementTokenizer())->tokenize(Yaml::parse("- {$handler}: true"));

    assertMatchesSnapshot($actual[0]->code(['method' => $method, 'model' => 'User']));
})->with([
    ['authorize', 'create'],
    ['authorize', 'show'],
    ['authorizeForUser', 'create'],
    ['authorizeForUser', 'show'],
    ['authorizeResource', 'create'],
    ['authorizeResource', 'show'],
    ['can', 'create'],
    ['can', 'show'],
    ['canAny', 'create'],
    ['canAny', 'show'],
    ['cannot', 'create'],
    ['cannot', 'show'],
    ['cant', 'create'],
    ['cant', 'show'],
]);

it('should parse the dispatch statement', function (): void {
    $actual = (new StatementTokenizer())->tokenize(Yaml::parse('- dispatch: SyncMedia with:user with:post'));

    assertMatchesSnapshot($actual[0]->code());
});

it('should parse the fire statement with an event class', function (): void {
    $actual = (new StatementTokenizer())->tokenize(Yaml::parse('- fire: NewPost with:post'));

    assertMatchesSnapshot($actual[0]->code());
});

it('should parse the fire statement with an event string', function (): void {
    $actual = (new StatementTokenizer())->tokenize(Yaml::parse('- fire: post.new with:post'));

    assertMatchesSnapshot($actual[0]->code());
});

it('should parse the session statement with flash', function (): void {
    $actual = (new StatementTokenizer())->tokenize(Yaml::parse('- flash: post.title'));

    assertMatchesSnapshot($actual[0]->code());
});

it('should parse the notify statement', function (): void {
    $actual = (new StatementTokenizer())->tokenize(Yaml::parse('- notify: post.author ReviewPost with:post'));

    assertMatchesSnapshot($actual[0]->code());
});

it('should parse the query statement with an all query', function (): void {
    $actual = (new StatementTokenizer())->tokenize(Yaml::parse('- query: all'));

    assertMatchesSnapshot($actual[0]->code(['reference' => 'User']));
});

it('should parse the query statement with an paginate query', function (): void {
    $actual = (new StatementTokenizer())->tokenize(Yaml::parse('- query: paginate'));

    assertMatchesSnapshot($actual[0]->code(['reference' => 'User']));
});

it('should parse the query statement with a simplePaginate query', function (): void {
    $actual = (new StatementTokenizer())->tokenize(Yaml::parse('- query: simplePaginate'));

    assertMatchesSnapshot($actual[0]->code(['reference' => 'User']));
});

it('should parse the query statement with a count query', function (): void {
    $actual = (new StatementTokenizer())->tokenize(Yaml::parse('- query: count'));

    assertMatchesSnapshot($actual[0]->code(['reference' => 'User']));
});

it('should parse the query statement with a exists query', function (): void {
    $actual = (new StatementTokenizer())->tokenize(Yaml::parse('- query: exists'));

    assertMatchesSnapshot($actual[0]->code(['reference' => 'User']));
});

it('should parse the query statement with a pluck query', function (): void {
    $actual = (new StatementTokenizer())->tokenize(Yaml::parse('- query: where:post.title take:3 pluck:post.id'));

    assertMatchesSnapshot($actual[0]->code(['reference' => 'User']));
});

it('should parse the query statement with multiple actions', function (): void {
    $actual = (new StatementTokenizer())->tokenize(Yaml::parse('- query: where:title where:content order:published_at limit:5'));

    assertMatchesSnapshot($actual[0]->code(['reference' => 'User']));
});

it('should parse the redirect statement with an action', function (): void {
    $actual = (new StatementTokenizer())->tokenize(Yaml::parse('- redirect: PostController show with:post'));

    assertMatchesSnapshot($actual[0]->code());
});

it('should parse the redirect statement with a route', function (): void {
    $actual = (new StatementTokenizer())->tokenize(Yaml::parse('- redirect: post.show with:post'));

    assertMatchesSnapshot($actual[0]->code());
});

it('should parse the resource statement', function (): void {
    $actual = (new StatementTokenizer())->tokenize(Yaml::parse('- resource: user'));

    assertMatchesSnapshot($actual[0]->code());
});

it('should parse the resource collection statement', function (): void {
    $actual = (new StatementTokenizer())->tokenize(Yaml::parse('- resource: user collection'));

    assertMatchesSnapshot($actual[0]->code());
});

it('should parse the resource pagination statement', function (): void {
    $actual = (new StatementTokenizer())->tokenize(Yaml::parse('- resource: user pagination'));

    assertMatchesSnapshot($actual[0]->code());
});

it('should parse the respond statement with content', function (): void {
    $actual = (new StatementTokenizer())->tokenize(Yaml::parse('- respond: content:post'));

    assertMatchesSnapshot($actual[0]->code());
});

it('should parse the respond statement with a status code', function (): void {
    $actual = (new StatementTokenizer())->tokenize(Yaml::parse('- respond: statusCode:204'));

    assertMatchesSnapshot($actual[0]->code());
});

it('should parse the mail statement', function (): void {
    $actual = (new StatementTokenizer())->tokenize(Yaml::parse('- mail: ReviewPost recipient:post.author with:post'));

    assertMatchesSnapshot($actual[0]->code());
});

it('should parse the notification statement', function (): void {
    $actual = (new StatementTokenizer())->tokenize(Yaml::parse('- notification: ReviewPost recipient:post.author with:post'));

    assertMatchesSnapshot($actual[0]->code());
});

it('should parse the session statement with store', function (): void {
    $actual = (new StatementTokenizer())->tokenize(Yaml::parse('- store: post.title'));

    assertMatchesSnapshot($actual[0]->code());
});

it('should parse the update statement with a single column', function (): void {
    $actual = (new StatementTokenizer())->tokenize(Yaml::parse('- update: post'));

    assertMatchesSnapshot($actual[0]->code(['reference' => 'User']));
});

it('should parse the update statement with multiple columns', function (): void {
    $actual = (new StatementTokenizer())->tokenize(Yaml::parse('- update: title, content, author_id'));

    assertMatchesSnapshot($actual[0]->code(['reference' => 'User']));
});

it('should parse the validate statement with a single column', function (): void {
    $actual = (new StatementTokenizer())->tokenize(Yaml::parse('- validate: post'));

    assertMatchesSnapshot($actual[0]->code());
});

it('should parse the validate statement with multiple columns', function (): void {
    $actual = (new StatementTokenizer())->tokenize(Yaml::parse('- validate: title, content, author_id'));

    assertMatchesSnapshot($actual[0]->code());
});

it('should parse the view statement', function (): void {
    $actual = (new StatementTokenizer())->tokenize(Yaml::parse('- view: post.show with:post with:foo with:bar'));

    assertMatchesSnapshot($actual[0]->code());
});
