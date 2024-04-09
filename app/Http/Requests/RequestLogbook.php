<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestLogbook extends FormRequest
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
            // 'bimbingan_id' => 'required|exists:bimbingans,id',
            'progres' => 'required|file|mimes:pdf,rar,zip|max:2048',
            'status' => 'required',
            'feedback' => 'nullable'
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
            'bimbingan_id.required' => 'Bimbingan harus diisi.',
            'bimbingan_id.exists' => 'Bimbingan tidak ditemukan.',
            'progres.required' => 'Progres harus diisi.',
            'status.required' => 'Status harus diisi.',
        ];
    }
}
