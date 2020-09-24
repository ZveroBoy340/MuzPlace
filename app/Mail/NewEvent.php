<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewEvent extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($event_name, $event_id)
    {
        $this->event_name = $event_name;
        $this->event_id = $event_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $event_name = $this->event_name;
        $event_id = $this->event_id;

        return $this->markdown('emails.new_event')->subject("MuzPlace - Новое мероприятие!")->from('support@german-granit.shop')->with([
            'event_name' => $event_name,
            'event_id' => $event_id
        ]);
    }
}
