<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $mail)
    {
        $this->email = $user->email;
        $this->title = $mail->mail_title;
        $this->text = $mail->mail_text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->email)
        ->subject($this->mail_title)
        ->view('admin.mail')
        ->with([
                'text' => $this->text,
            ]);
    }
}
