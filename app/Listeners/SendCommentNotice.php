<?php

namespace App\Listeners;

use App\Events\CommentNotifications;
use App\Mailers\CommentMailer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCommentNotice
{
    public $mailer;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(CommentMailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  CommentNotifications  $event
     * @return void
     */
    public function handle(CommentNotifications $event)
    {
        $this->mailer->notice($event->comment);
    }
}
