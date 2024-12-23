<?php

namespace Cws\Payments\Contracts;

use Cws\Payments\Models\Payment;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

interface PaymentContract
{
    /**
     * @param Payment $payment
     * @return string
     */
    public function charge(Payment $payment): string;

    /**
     * @param Payment $payment
     * @param Request $request
     * @return Response|string
     */
    public function handle(Payment $payment, Request $request): Response|string;
}