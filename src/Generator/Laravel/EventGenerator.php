<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Laravel;

use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;
use BombenProdukt\Arch\Model\Event;

final class EventGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Event
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
