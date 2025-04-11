<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'customer_address' => 'required',
            'customer_phone' => 'required',
            'customer_name' => 'required',
            'product_id' => 'required',
            'qty' => 'required|numeric|min:1',
        ];

    }

    public function messages(){
        return [
            'customer_address.required' => 'Vui lòng nhập điểm giao hàng',
            'customer_phone.required' => 'Vui của nhập số điện thoại giao hàng',
            'customer_name.required' => 'Vui lòng  nhập tên người nhận hàng', 
            'product_id.required' => 'Vui lòng chọn sản phẩm',
            'qty.required' => 'Vui lòng nhập số lượng sản phẩm',
            'qty.numeric' => 'Số lượng sản phẩm phải là số',
            'qty.min' => 'Số lượng sản phẩm phải lớn hơn hoặc bằng 1',
        ];
    }
}
