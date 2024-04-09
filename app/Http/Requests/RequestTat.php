<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestTat extends FormRequest
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
            'nim' => 'required|integer',
            'surat_keterangan_lulus' => 'required|file|mimes:pdf|max:2048',
            'tugas_akhir' => 'required|file|mimes:pdf|max:2048',
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
            'nama.required' => 'Nama harus diisi.',
            'nim.required' => 'NIM harus diisi.',
            'nim.integer' => 'NIM harus berupa angka.',
            'surat_keterangan_lulus.required' => 'Surat keterangan lulus harus diisi.',
            'tugas_akhir.required' => 'Tugas akhir harus diisi.',
        ];
    }
}
