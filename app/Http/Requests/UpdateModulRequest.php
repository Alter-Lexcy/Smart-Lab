<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateModulRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'class_id' => ['required', 'exists:classes,id'],
            'title' => ['required', Rule::unique('moduls','title')->ignore($this->route('moduls'))],
            'description' => ['nullable'],
            'file_modul' => ['required', 'file', 'max:3072', 'mimes:jpg,jpeg,png,pdf']
        ];
    }
    public function messages()
    {
        return [
            'class_id.required' => 'Tugas Belum Ter-isi',
            'class_id.exists' => 'Data Tugas Tidak Ada',
            'title.required' => 'Judul Modul Belum Ter-isi',
            'title.unique' => 'Judul Modul Tidak Ada',
            'file_modul.required' => 'File Modul Belum Ter-isi',
            'file_modul.file' => 'File Modul Harus Berformat File',
            'file_modul.max' => 'File Modul Melebihi Batas',
            'file_modul.mimes' => 'File Modul Harus Bertipe jpg,jpeg,png,pdf',
        ];
    }
}
