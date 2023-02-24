<?php

namespace App\Http\Requests\Backoffice;

use App\Rules\Stock;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'nama' => 'required|max:255',
            'product_brand_id' => 'required|numeric',
            'status' => 'nullable|string',
            'stock' => ['array', new Stock],
            'deskripsi' => 'required|string',
            'gambar' => 'sometimes|required|array',
            'gambar.*' => 'required|image'
        ];
    }
}
