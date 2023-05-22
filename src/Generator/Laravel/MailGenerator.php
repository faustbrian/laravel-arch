<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Laravel;

use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;
use BombenProdukt\Arch\Model\Mail;

final class MailGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Mail
         */
        foreach (Tree::get('mails') as $mail) {
            $this->createFile(
                $mail->name(),
                $this->renderClass($mail, $this->stub($mail), [
                    'class' => $mail->name(),
                    'subject' => $mail->subject(),
                    'view' => $mail->view(),
                ]),
            );
        }

        $this->persist();
    }

    private function stub(Mail $mail): string
    {
        if ($mail->shouldBeMarkdown()) {
            if ($mail->shouldQueue()) {
                return 'laravel/mail/markdown/queued';
            }

            return 'laravel/mail/markdown/mail';
        }

        if ($mail->shouldQueue()) {
            return 'laravel/mail/queued';
        }

        return 'laravel/mail/mail';
    }
}
