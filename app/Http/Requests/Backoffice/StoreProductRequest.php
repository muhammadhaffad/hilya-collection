<?php

namespace App\Http\Requests\Backoffice;

use App\Rules\Stock;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'status' => 'required|string',
            'diskon' => 'numeric|nullable',
            'deskripsi' => 'required|string',
            'gambar' => 'required|array|min:1|max:4',
            'gambar.*' => 'required|image',
            'stock' => ['required','array', new Stock]
        ];
    }
}
