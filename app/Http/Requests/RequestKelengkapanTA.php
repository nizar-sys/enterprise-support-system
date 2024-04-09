<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestKelengkapanTA extends FormRequest
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
            'nama' => 'required',
            'khs' => 'nullable|file|mimes:pdf',
            'eprt' => 'nullable|file|mimes:pdf',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'nama.required' => 'Nama harus diisi.',
            'khs.required' => 'KHS harus diisi.',
            'eprt.required' => 'EPRT harus diisi.',
        ];
    }
}
