<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Generator\Laravel\Nova;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;
use BaseCodeOy\Arch\Model\Nova\Action;

final class ActionGenerator extends AbstractGenerator
{
    #[\Override()]
    public function generate(): void
    {
        foreach (Tree::get('nova.actions') as $action) {
            $this->createFile(
                $action->name(),
                $this->renderClass($action, $this->stub($action), [
                    'class' => $action->name(),
                ]),
            );
        }

        $this->persist();
    }

    #[\Override()]
    protected function accessor(): string
    {
        return 'nova.actions';
    }

    private function stub(Action $action): string
    {
        return match (true) {
            $action->shouldBeDestructive() && $action->shouldBeQueued() => 'laravel/nova/action/destructive/queued',
            $action->shouldBeDestructive() => 'laravel/nova/action/destructive',
            $action->shouldBeQueued() => 'laravel/nova/action/queued',
            default => 'laravel/nova/action/action',
        };
    }
}
