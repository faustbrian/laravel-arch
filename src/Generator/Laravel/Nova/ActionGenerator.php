<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Laravel\Nova;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;
use BaseCodeOy\Arch\Model\Nova\Action;

final class ActionGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Nova\Action
         */
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
