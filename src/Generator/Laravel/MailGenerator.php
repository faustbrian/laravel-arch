<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Generator\Laravel;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;
use BaseCodeOy\Arch\Model\Mail;

final class MailGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /** @var Mail */
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
