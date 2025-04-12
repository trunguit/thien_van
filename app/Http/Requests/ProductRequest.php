<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
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
    $productId = $this->request->get('id');
    return [
        'name' => [
            'required',
            'string',
            'max:255',
            Rule::unique('products')->ignore($productId),
        ],
        'category_id' => 'required|exists:categories,id|not_in:0',
        'status' => 'required|in:active,inactive',
        'description' => 'nullable|string',
        'meta_title' => 'nullable|string',
        'meta_description' => 'nullable|string',
        'min_qty' => 'required|integer|min:1',
        'max_qty' => 'nullable|integer|gte:min_qty',
        'price' => 'required|numeric|min:0',
        'sale_price' => 'nullable|numeric|lte:price',
        'sku' => [
            'nullable',
            'string',
            'max:100',
            Rule::unique('products')->ignore($productId),
        ],
        'upc' => [
            'nullable',
            'string',
            'max:100',
            Rule::unique('products')->ignore($productId),
        ],
        'condition' => 'nullable',
    ];
}

public function messages()
{
    return [
        'name.required' => 'Vui lòng nhập tên sản phẩm.',
        'name.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',
        'name.unique' => 'Tên sản phẩm đã tồn tại.',
        'category_id.required' => 'Vui lòng chọn danh mục.',
        'category_id.exists' => 'sản phẩm không hợp lệ.',
        'category_id.not_in' => 'Vui lòng chọn danh mục hợp lệ.',
        'status.required' => 'Vui lòng chọn trạng thái.',
        'status.in' => 'Trạng thái không hợp lệ.',
        'min_qty.required' => 'Vui lòng nhập số lượng tối thiểu.',
        'min_qty.integer' => 'Số lượng tối thiểu phải là số nguyên.',
        'min_qty.min' => 'Số lượng tối thiểu phải lớn hơn 0.',
        'max_qty.integer' => 'Số lượng tối đa phải là số nguyên.',
        'max_qty.gte' => 'Số lượng tối đa phải lớn hơn hoặc bằng số lượng tối thiểu.',
        'price.required' => 'Vui lòng nhập giá sản phẩm.',
        'price.numeric' => 'Giá sản phẩm phải là số.',
        'price.min' => 'Giá sản phẩm không được âm.',
        'sale_price.numeric' => 'Giá khuyến mãi phải là số.',
        'sale_price.lte' => 'Giá khuyến mãi phải nhỏ hơn hoặc bằng giá gốc.',
        'sku.unique' => 'SKU đã tồn tại.',
        'upc.unique' => 'UPC đã tồn tại.',
       
    ];
}
}
