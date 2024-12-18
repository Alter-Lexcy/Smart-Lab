<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMateriRequest extends FormRequest
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
            'classes_id'=>['required','exists:classes,id'],
            'title_materi'=>['required','unique:materis,title_materi'],
            'file_materi'=>['required','mimes:pdf','max:10240'],
        ];
    }
    public function messages()
    {
        return [
            'classes_id.required'=>'Kelas Belum Di-Pilih',
            'classes_id.exists'=>'Kelas Tidak Ada',
            'title_materi.required'=>'Judul Materi Belum Di-isi',
            'title_materi.alpha_num'=>'Judul Materi Hanya Berformat Angka Dan Huruf',
            'title_materi.unique'=>'Judul Materi Sudah Ada',
            'file_materi.required'=>'File Materi Belum Di-isi',
            'file_materi.mimes'=>'File Materi Harus Bertipe PDF',
            'file_materi.max'=>'File Materi Harus Dibawah 10 MB',
        ];
    }
}
