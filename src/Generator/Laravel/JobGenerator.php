<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Laravel;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class JobGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Job
         */
        foreach (Tree::get('jobs') as $job) {
            $this->createFile(
                $job->name(),
                $this->renderClass($job, $job->shouldQueue() ? 'laravel/job/queued' : 'laravel/job/job', [
                    'class' => $job->name(),
                ]),
            );
        }

        $this->persist();
    }
}
