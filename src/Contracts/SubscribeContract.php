<?php

namespace Cws\Payments\Contracts;

use Cws\Payments\Models\Payment;

interface SubscribeContract
{
    /**
     * @param Payment $payment
     * @return bool
     */
    public function debit(Payment $payment): bool;
}