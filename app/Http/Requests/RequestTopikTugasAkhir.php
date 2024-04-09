<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestTopikTugasAkhir extends FormRequest
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
            'judul' => 'required|max:255',
            'kouta' => 'required|numeric',
            'objek' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'judul.required' => 'Judul harus diisi.',
            'judul.max' => 'Judul maksimal 255 karakter.',
            'kouta.required' => 'Kuota harus diisi.',
            'kouta.numeric' => 'Kuota harus berupa angka.',
            'objek.required' => 'Objek harus diisi.',
            'objek.string' => 'Objek harus berupa string.',
            'objek.max' => 'Objek maksimal 255 karakter.',
            'publisher.required' => 'Pengusul harus diisi.',
            'publisher.string' => 'Pengusul harus berupa string.',
            'publisher.max' => 'Pengusul maksimal 255 karakter.',
        ];
    }
}
