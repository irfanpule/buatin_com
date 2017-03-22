<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'provinsi' => 'required',
            'kab-kota' => 'required',
            'address' => 'required',
            'phone_number' => 'required|numeric',
            'wa_number' => 'nullable|numeric',
            'pin_bbm' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'provinsi.required' => 'Harus memilih Provinsi',
            'kab-kota.required' => 'Harus memilih Kabupaten / Kota',
            'address.required' => 'Harus mengisi Alamat',
            'phone_number.required' => 'Harus mengisi Nomor Telepon',
            'phone_number.numeric' => 'Nomor Telepon hanya berupa Angka',
        ];
    }
}
