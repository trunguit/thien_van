<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KeywordRequest extends FormRequest
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
            'keyword' => 'required|string|max:255|unique:keywords,keyword,' . $this->id
            ];
    }

    public function messages()
    {
        return [
            'keyword.required' => 'Từ khóa là bắt buộc.',
            'keyword.string' => 'Từ khóa phải là một chuỗi.',
            'keyword.max' => 'Từ khóa không được vượt quá 255 ký tự.',
            'keyword.unique' => 'Từ khóa đã tồn tại.',
        ];
    }
}
