<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orders, $order, $total, $subject, $orderName, $reason)
    {
        $this->orders = $orders;
        $this->order = $order;
        $this->total = $total;
        $this->subject = $subject;
        $this->orderName = $orderName;
        $this->reason = $reason;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->view('mail.email-order', ['orders'=> $this->orders, 
        'order'=> $this->order, 'total'=> $this->total, 'orderName'=> $this->orderName, 'reason'=> $this->reason, ]);
    }
}
