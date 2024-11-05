<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Laravel;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;
use BaseCodeOy\Arch\Model\Event;

final class EventGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Event
         */
        foreach (Tree::get('events') as $event) {
            $this->createFile(
                $event->name(),
                $this->renderClass(
                    model: $event,
                    stub: $this->stub($event),
                    data: ['class' => $event->name()],
                ),
            );
        }

        $this->persist();
    }

    private function stub(Event $event): string
    {
        return match (true) {
            $event->shouldBroadcast() => 'laravel/event/broadcast',
            default => 'laravel/event/event',
        };
    }
}
