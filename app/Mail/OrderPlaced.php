<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;

     /**
     * The order instance.
     *
     * @var Order
     */
    public $order;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
                    ->to($this->order->billing_email ,$this->order->billing_name)
                    ->bcc('another@another.com')  //blind carbon copy
                     ->subject('Order for laravel Ecommerce')
                    ->view('emails.orders.placed');
    }
}
