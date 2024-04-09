<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestBimbingan extends FormRequest
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
            'jadwal_id' => 'required|exists:jadwals,id',
            'dosen_id' => 'required|exists:lecturers,id',
            'status' => 'required',
            'nama_mahasiswa' => 'required',
            'nim' => 'required|numeric',
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
            'jadwal_id.required' => 'Jadwal tidak boleh kosong',
            'jadwal_id.exists' => 'Jadwal tidak ditemukan',
            'dosen_id.required' => 'Dosen tidak boleh kosong',
            'dosen_id.exists' => 'Dosen tidak ditemukan',
            'status.required' => 'Status tidak boleh kosong',
            'nama_mahasiswa.required' => 'Nama mahasiswa tidak boleh kosong',
            'nim.required' => 'Nim tidak boleh kosong',
            'nim.numeric' => 'Nim harus berupa angka',
        ];
    }
}
