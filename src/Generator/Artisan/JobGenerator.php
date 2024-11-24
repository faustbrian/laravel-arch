<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\MakeJobCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class JobGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /** @var \BaseCodeOy\Arch\Model\Job */
        foreach (Tree::get('jobs') as $job) {
            $artisan = new MakeJobCommand();
            $artisan->name($job->name());
            $artisan->handle();
        }
    }
}
