<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'post_title' => 'required|max:100',
            'post_category' => 'required',
            'post_content' => 'required',
            'default_image' => 'required',
            'price_start' => 'required',
            'price_end' => 'required',
            'file' => 'mimes:jpeg,jpg,png'
        ];
    }

    public function messages()
    {
        return [
            'post_title.required' => 'Nama Produk/Proyek/Karya harus disini',
            'post_title.max' => 'Maksimal Nama Produk/Proyek/Karya 100 karakter',
            'post_category.required' => 'Kategori harus diisi',
            'post_content.required' => 'Deskripsi harus diisi',
            'default_image.required' => 'Harus memilih gambar default',
            'price_start.required' => 'Rentang Awal harus diisi',
            'price_end.required' => 'Rentang Akhir harus diisi',
        ];
    }
}
