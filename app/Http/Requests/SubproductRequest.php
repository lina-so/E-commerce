<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubproductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'product_id' => 'required|exists:products,id',
            'description' => 'required|string',
            'image' => 'required|max:2048',
            'name' => 'required|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'quantity' => 'required|integer|min:0',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'يجب تحديد الفئة',
            'category_id.exists' => 'الفئة المحددة غير صالحة',
            'product_id.required' => 'يجب تحديد المنتج',
            'product_id.exists' => 'المنتج المحدد غير صالح',
            'description.required' => 'يجب أدخال الوصف',
            'image.required' => 'يجب رفع صورة',
            'image.max' => 'يجب ألا يتجاوز حجم الصورة 2 ميجابايت',
            'name.required' => 'يجب أدخال الاسم',
            'name.max' => 'يجب ألا يتجاوز الاسم 255 حرفًا',
            'price.numeric' => 'يجب أن يكون السعر رقمًا',
            'price.min' => 'يجب أن يكون السعر أكبر من أو يساوي الصفر',
            'discount_price.numeric' => 'يجب أن يكون سعر الخصم رقمًا',
            'discount_price.min' => 'يجب أن يكون سعر الخصم أكبر من أو يساوي الصفر',
            'quantity.required' => 'يجب أدخال الكمية',
            'quantity.integer' => 'يجب أن تكون الكمية رقمًا صحيحًا',
            'quantity.min' => 'يجب أن تكون الكمية أكبر من أو تساوي الصفر',
        ];
    }
}
