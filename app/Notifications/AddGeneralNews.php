<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\GeneralNews;

class AddGeneralNews extends Notification
{
    use Queueable;

    protected $general_notification;

    public function __construct(GeneralNews $general_notification)
    {
        $this->general_notification = $general_notification;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'data' => "Notice : ".$this->general_notification->general_news
        ];
    }
}
