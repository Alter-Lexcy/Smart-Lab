<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMateriRequest extends FormRequest
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
            'title_materi' => ['required','string','max:255',Rule::unique('materis', 'title_materi')->ignore($this->materi)],
            'file_materi' => ['nullable', 'mimes:pdf', 'max:10240'],
            'description' => ['nullable'],
        ];
    }

    public function messages()
    {
        return [
            'class_id.required'=>'Kelas Belum Di-Pilih',
            'class_id.exists'=>'Kelas Tidak Ada',
            'title_materi.required'=>'Judul Materi Belum Di-isi',
            'title_materi.string'=>'Judul Materi Hanya Berformat String',
            'title_materi.unique'=>'Judul Materi Sudah Ada',
            'file_materi.mimes'=>'File Materi Harus Bertipe PDF',
            'file_materi.max'=>'File Materi Harus Dibawah 10 MB',
        ];
    }
}
