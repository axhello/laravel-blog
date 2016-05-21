<?php

namespace App\Mailers;


class CommentMailer extends Mailers
{
    public function notice($user)
    {
        $subject = "评论通知邮件";
        $view = 'emails.notice';
        $data = ['username' => $user->username];

        $this->sendTo($user, $view, $subject, $data);
    }
}