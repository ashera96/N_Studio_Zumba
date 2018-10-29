<?php

namespace App\Notifications;

use App\HealthTip;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AddHealthTip extends Notification
{
    use Queueable;

    protected $health_tip;

    public function __construct(HealthTip $health_tip)
    {
        $this->health_tip = $health_tip;
    }

    public function via($notifiable)
    {
        return ['database'];
    }


    public function toArray($notifiable)
    {
        return [
            'data' => "".$this->health_tip->healthtips
        ];
    }
}
