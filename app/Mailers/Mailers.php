<?php
namespace App\Mailers;

class Mailers
{
    public function sendTo($user, $view, $subject, $data = [])
    {
        \Mail::queue($view, $data, function ($message) use ($user, $subject){
            $message->to($user->email)->subject($subject);
        });
    }
}