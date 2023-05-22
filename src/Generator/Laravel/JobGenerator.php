<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Laravel;

use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class JobGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Job
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
