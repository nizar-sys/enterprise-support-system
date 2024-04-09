<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestHomePage extends FormRequest
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
            'matkul' => 'required',
            'deskripsi' => 'required',
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
            'matkul.required' => 'Matkul harus diisi.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
        ];
    }
}
