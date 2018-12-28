<?php

namespace App\Notifications;

use App\MedicalAdvice;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AddMediAdvice extends Notification
{
    use Queueable;

    protected $medi_advice;

    public function __construct(MedicalAdvice $medi_advice) //pass a MedicalAdvice model variable to the constructor
    {
        $this->medi_advice = $medi_advice;
    }

    public function via($notifiable)
    {
        return ['database']; //notify through the database
    }


    public function toArray($notifiable)
    {
        return [
            'data' => "Medical Advice For You : ".$this->medi_advice->advice //return data for notification table data column
        ];
    }
}
