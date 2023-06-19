<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AcceptedMail extends Mailable
{
    use Queueable, SerializesModels;

    // public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orders, $order, $total)
    {
        $this->orders = $orders;
        $this->order = $order;
        $this->total = $total;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your order has been accepted.')->view('mail.email-order', ['orders'=> $this->orders, 
        'order'=> $this->order, 'total'=> $this->total ]);
    }
}
