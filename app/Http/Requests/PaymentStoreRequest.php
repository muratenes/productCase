<?php

namespace App\Http\Requests;

use App\Models\Address;
use App\Models\Product;
use App\Models\User;
use App\Services\Payment\Models\PaymentData;
use Illuminate\Foundation\Http\FormRequest;

class PaymentStoreRequest extends FormRequest
{
    public ?PaymentData $paymentData = null;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'address' => 'nullable|integer|exists:addresses',
            'payment_method' => 'string|required'
        ];
    }

    public function passedValidation()
    {
        $this->paymentData = (new PaymentData())
            ->setQuantity($this->quantity)
            ->setUser(User::find(random_int(1,3))) // todo : change with auth user
            ->setPaymentMethod($this->payment_method)
            ->setExtra($this->validated())
            ->setAddress(Address::find($this->address));
    }
}
