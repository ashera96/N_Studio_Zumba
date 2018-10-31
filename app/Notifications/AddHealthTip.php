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

    public function __construct(HealthTip $health_tip) //pass a HealthTip model variable to the constructor
    {
        $this->health_tip = $health_tip;
    }

    public function via($notifiable)
    {
        return ['database']; //notify through the database
    }


    public function toArray($notifiable)
    {
        return [
            'data' => "HealthTip : ".$this->health_tip->healthtips //return data for notification table data column
        ];
    }
}
