<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductVariantRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Cho phép tất cả người dùng gửi yêu cầu
    }

    public function rules()
    {
        return [
            'Quantity' => 'required|integer|min:1', // Số lượng là bắt buộc và phải là số nguyên lớn hơn 0
            'Price' => 'required|numeric|min:0',    // Giá là bắt buộc và phải là số dương
        ];
    }

    public function messages()
    {
        return [
            'Quantity.required' => 'Số lượng là bắt buộc.',
            'Quantity.integer' => 'Số lượng phải là một số nguyên.',
            'Quantity.min' => 'Số lượng phải lớn hơn 0.',
            'Price.required' => 'Giá là bắt buộc.',
            'Price.numeric' => 'Giá phải là một số.',
            'Price.min' => 'Giá phải lớn hơn hoặc bằng 0.',
        ];
    }
}