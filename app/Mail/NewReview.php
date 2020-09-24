<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewReview extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_name, $review_text)
    {
        $this->user_name = $user_name;
        $this->review_text = $review_text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user_name = $this->user_name;
        $review_text = $this->review_text;

        return $this->markdown('emails.new_review')->subject("MuzPlace - Новый отзыв!")->from('support@german-granit.shop')->with([
            'user_name' => $user_name,
            'review_text' => $review_text
        ]);
    }
}
