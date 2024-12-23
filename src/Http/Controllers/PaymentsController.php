<?php

namespace Cws\Payments\Http\Controllers;

use App\Http\Controllers\Controller;
use Cws\Payments\Models\Payment;
use Cws\Payments\Contracts\PaymentContract as PaymentService;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    /**
     * @param Payment $payment
     * @param Request $request
     * @param PaymentService $paymentService
     * @return mixed
     */
    public function callback(Payment $payment, Request $request, PaymentService $paymentService)
    {
        return $paymentService->handle($payment, $request);
    }
}