<?php

namespace App\Services\Payment\Models;

use App\Models\Address;
use App\Models\Product;
use App\Models\User;

class PaymentData
{
    private Product $product;
    private ?User $user = null;
    private ?Address $address = null;
    private string $paymentMethod;
    private array $extra;

    private int $quantity;

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function setProduct(Product $product): self
    {
        $this->product = $product;
        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;
        return  $this;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(?Address $address): self
    {
        $this->address = $address;
        return $this;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(string $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;
        return $this;
    }

    public function getExtra(string $key = null): mixed
    {
        if ($key) {
            return $this->extra[$key] ?? null;
        }
        return $this->extra;
    }

    public function setExtra(array $extra): self
    {
        $this->extra = $extra;
        return $this;
    }
}
