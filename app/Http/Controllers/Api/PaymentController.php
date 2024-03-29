<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ValidationException;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentStoreRequest;
use App\Services\Payment\Payment;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     * @throws ValidationException
     */
    public function store(PaymentStoreRequest $request, Payment $payment)
    {
        return $payment->pay($request->paymentData);
    }
}
