<?php

namespace App\Notifications;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OrdersNotification extends Notification
{
    use Queueable;
    private $orderData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($orderData)
    {
        $this->orderData = $orderData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line($this->orderData['body'])
                    ->action($this->orderData['text'], $this->orderData['url']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $latest=Order::orderBy('created_at','DESC')->take(1)->get();
        foreach ($latest as $order){
            $customer = $order->name;
        }
        return [
            'name' => $customer,
        ];
    }
}