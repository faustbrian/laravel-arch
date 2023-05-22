<?php

declare(strict_types=1);

namespace Tests\Feature\Command;

use BombenProdukt\Arch\Command\BuildCommand;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Process;
use function Spatie\Snapshots\assertMatchesSnapshot;

beforeEach(function (): void {
    Carbon::setTestNow('2023-01-01 00:00:03');
});

it('can execute the command and generate', function (): void {
    File::partialMock();
    Process::fake();

    File::shouldReceive('exists')
        ->with(base_path('.arch/manifest.yaml'))
        ->andReturn(true);

    File::shouldReceive('missing')
        ->with($pintBinary = base_path('vendor/bin/pint'))
        ->andReturn(false);

    File::shouldReceive('get')
        ->with(base_path('.arch/manifest.yaml'))
        ->andReturn(fixture('Configuration/model', 'yaml'));

    File::shouldReceive('put')
        ->andReturn(true);

    File::shouldReceive('exists')
        ->andReturn(false);

    File::shouldReceive('makeDirectory')
        ->andReturn(true);

    $result = Artisan::call(BuildCommand::class);

    Process::assertRan("{$pintBinary} app/Http/Controllers/CommentController.php");
    Process::assertRan("{$pintBinary} app/Http/Controllers/PostController.php");
    Process::assertRan("{$pintBinary} app/Http/Requests/StoreCommentRequest.php");
    Process::assertRan("{$pintBinary} app/Http/Requests/StorePostRequest.php");
    Process::assertRan("{$pintBinary} app/Http/Requests/UpdateCommentRequest.php");
    Process::assertRan("{$pintBinary} app/Http/Requests/UpdatePostRequest.php");
    Process::assertRan("{$pintBinary} app/Http/Resources/CommentResource.php");
    Process::assertRan("{$pintBinary} app/Http/Resources/PostResource.php");
    Process::assertRan("{$pintBinary} app/Models/Comment.php");
    Process::assertRan("{$pintBinary} app/Models/Post.php");
    Process::assertRan("{$pintBinary} app/Policies/CommentPolicy.php");
    Process::assertRan("{$pintBinary} app/Policies/PostPolicy.php");
    Process::assertRan("{$pintBinary} database/factories/CommentFactory.php");
    Process::assertRan("{$pintBinary} database/factories/PostFactory.php");
    Process::assertRan("{$pintBinary} database/migrations/2023_01_01_000000_create_posts_table.php");
    Process::assertRan("{$pintBinary} database/migrations/2023_01_01_000001_create_comments_table.php");
    Process::assertRan("{$pintBinary} database/migrations/2023_01_01_000002_create_comment_post_table.php");
    Process::assertRan("{$pintBinary} database/migrations/2023_01_01_000003_create_tagables_table.php");
    Process::assertRan("{$pintBinary} database/seeders/CommentSeeder.php");
    Process::assertRan("{$pintBinary} database/seeders/PostSeeder.php");
    Process::assertRan("{$pintBinary} tests/Feature/Http/Controllers/CommentControllerTest.php");
    Process::assertRan("{$pintBinary} tests/Feature/Http/Controllers/PostControllerTest.php");
    Process::assertRan("{$pintBinary} tests/Unit/Models/CommentTest.php");
    Process::assertRan("{$pintBinary} tests/Unit/Models/PostTest.php");

    expect($result)->toBe(BuildCommand::SUCCESS);

    assertMatchesSnapshot(Artisan::output());
});
