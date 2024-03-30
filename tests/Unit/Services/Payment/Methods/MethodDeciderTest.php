<?php

namespace Tests\Unit\Services\Payment\Methods;

use App\Services\Payment\Methods\CreditCardPayment;
use App\Services\Payment\Methods\MethodDecider;
use App\Services\Payment\Methods\PaypalPayment;
use PHPUnit\Framework\TestCase;

class MethodDeciderTest extends TestCase
{

    public function testDecideCorrectPaymentMethod()
    {
        $creditCardPayment = MethodDecider::decide('credit_card');
        $paypalPayment = MethodDecider::decide('paypal');

        $this->assertInstanceOf(CreditCardPayment::class, $creditCardPayment);
        $this->assertInstanceOf(PaypalPayment::class, $paypalPayment);
    }

    public function testExceptionForInvalidType()
    {
        $this->expectException(\Exception::class);

        MethodDecider::decide('invalid');
    }
}
