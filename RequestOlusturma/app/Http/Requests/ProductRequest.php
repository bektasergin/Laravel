<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
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
            'name' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
            'description' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.requried' => 'Ürün ismi zorunludur!',
            'price.requried'=> 'Ürün fiyatı zorunludur!',
            'stock.requried'=> 'Ürün stoğu zorunludur!',
        ];
    }

    public function attributes(){
        return [
            'name'=> 'Ürün Adı',
            'price'=> 'Ürün fiyatı',
            'description'=> 'Ürün Açıklamsı',
            'stock'=> 'Ürün Stoğu'
        ];
    }
}
