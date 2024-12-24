<?php

namespace Cws\Payments\Events;

use Cws\Payments\Models\Payment;

class SubscribeEvent
{
    /**
     * @var Payment
     */
    public $payment;

    /**
     * PaymentCompletedEvent constructor.
     *
     * @param Payment $payment
     */
    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
    }
}