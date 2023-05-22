<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Laravel;

use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;
use BombenProdukt\Arch\Model\Notification;

final class NotificationGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Notification
         */
        foreach (Tree::get('notifications') as $notification) {
            $this->createFile(
                $notification->name(),
                $this->renderClass($notification, $this->stub($notification), [
                    'class' => $notification->name(),
                    'view' => $notification->view(),
                ]),
            );
        }

        $this->persist();
    }

    private function stub(Notification $notification): string
    {
        if ($notification->shouldBeMarkdown()) {
            if ($notification->shouldQueue()) {
                return 'laravel/notification/markdown/queued';
            }

            return 'laravel/notification/markdown/notification';
        }

        if ($notification->shouldQueue()) {
            return 'laravel/notification/queued';
        }

        return 'laravel/notification/notification';
    }
}
