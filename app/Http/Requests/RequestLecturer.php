<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestLecturer extends FormRequest
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
        $rules = [
            'kode_dosen' => 'required|max:255',
            'nama' => 'required|string|max:255',
            'nip' => 'required|numeric|',
            'email' => 'required|email',
            'telepon' => 'required|numeric',
        ];

        if($this->isMethod('POST')){
            $rules['kode_dosen'] .= '|unique:lecturers,kode_dosen,';
            $rules['nama'] .= '|unique:lecturers,nama,';
            $rules['nip'] .= '|unique:lecturers,nip,';
            $rules['email'] .= '|unique:lecturers,email,';
            $rules['telepon'] .= '|unique:lecturers,telepon,';
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'kode_dosen.required' => 'Kode dosen harus diisi.',
            'kode_dosen.max' => 'Kode dosen maksimal 255 karakter.',
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa string.',
            'nama.max' => 'Nama maksimal 255 karakter.',
            'nip.required' => 'NIP harus diisi.',
            'nip.numeric' => 'NIP harus berupa angka.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Email harus berupa email.',
            'telepon.required' => 'Telepon harus diisi.',
            'telepon.numeric' => 'Telepon harus berupa angka.',
            'kode_dosen.unique' => 'Kode dosen sudah digunakan.',
            'nama.unique' => 'Nama sudah digunakan.',
            'nip.unique' => 'NIP sudah digunakan.',
            'email.unique' => 'Email sudah digunakan.',
            'telepon.unique' => 'Telepon sudah digunakan.',
        ];
    }
}
