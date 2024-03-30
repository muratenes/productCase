<?php

namespace App\Services\Payment\Models;

class Result implements \JsonSerializable
{

    private bool $success = false;
    private PaymentData $paymentData;

    public function jsonSerialize(): array
    {
        $user = $this->paymentData->getUser();

        return [
            'success' => $this->isSuccess(),
            'user' => [
                'id' => $user->id,
                'email' => $user->email
            ],
            'product' => $this->paymentData->getProduct()
        ];
    }

    public function isSuccess(): bool
    {
        return $this->success;
    }

    public function setSuccess(bool $success): self
    {
        $this->success = $success;
        return $this;
    }

    public function getPaymentData(): PaymentData
    {
        return $this->paymentData;
    }

    public function setPaymentData(PaymentData $paymentData): void
    {
        $this->paymentData = $paymentData;
    }

}
