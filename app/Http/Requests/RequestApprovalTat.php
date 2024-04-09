<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestApprovalTat extends FormRequest
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
            'tat_id' => 'required|exists:t_a_t_s,id',
            'tahun_lulus' => 'required|numeric',
            'email' => 'required|email',
            'telepon' => 'required|numeric',
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
            'tat_id.required' => 'Tugas Akhir Terdahulu harus diisi',
            'tat_id.exists' => 'Tugas Akhir Terdahulu tidak ditemukan',
            'tahun_lulus.required' => 'Tahun lulus harus diisi',
            'tahun_lulus.numeric' => 'Tahun lulus harus berupa angka',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'telepon.required' => 'Telepon harus diisi',
            'telepon.numeric' => 'Telepon harus berupa angka',
        ];
    }
}
