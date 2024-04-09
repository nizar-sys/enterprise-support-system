<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestTugasakhir extends FormRequest
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
            'dosen_id' => 'required|exists:lecturers,id',
            'topik_id' => 'required|exists:topik_tugas_akhirs,id',
            'bimbingan_id' => 'required|exists:bimbingans,id',
            'kelengkapan_id' => 'required|exists:kelengkapan_t_a_s,id',
            'skta_id' => 'required|exists:s_k_t_a_s,id',
            'tat_id' => 'required|exists:t_a_t_s,id',
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
            'dosen_id.required' => 'Dosen wajib diisi.',
            'dosen_id.exists' => 'Dosen tidak ditemukan.',
            'topik_id.required' => 'Topik wajib diisi.',
            'topik_id.exists' => 'Topik tidak ditemukan.',
            'bimbingan_id.required' => 'Bimbingan wajib diisi.',
            'bimbingan_id.exists' => 'Bimbingan tidak ditemukan.',
            'kelengkapan_id.required' => 'Kelengkapan wajib diisi.',
            'kelengkapan_id.exists' => 'Kelengkapan tidak ditemukan.',
            'skta_id.required' => 'Surat Keterangan wajib diisi.',
            'skta_id.exists' => 'Surat Keterangan tidak ditemukan.',
            'tat_id.required' => 'Tugas akhir terdahulu wajib diisi.',
            'tat_id.exists' => 'Tugas akhir terdahulu tidak ditemukan.',
        ];
    }
}
