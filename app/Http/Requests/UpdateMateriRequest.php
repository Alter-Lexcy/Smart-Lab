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
            'subject_id'=>['required','exists:subjects,id'],
            'classes_id'=>['required','exists:classes,id'],
            'title_materi'=>['required','alpha_num',Rule::unique('materis','title_materi')],
            'file_materi'=>['required','mimes:png,jpg,pdf','max:3072'],
            'description'=>['max:255']
        ];
    }
    public function messages()
    {
        return [
            'subject_id.required'=>'Mata Pembelajaran Belum Di-Pilih',
            'subject_id.exists'=>'Mata Pembelajaran Tidak Ada',
            'classes_id.required'=>'Kelas Belum Di-Pilih',
            'classes_id.exists'=>'Kelas Tidak Ada',
            'title_materi.required'=>'Judul Materi Belum Di-isi',
            'title_materi.alpha_num'=>'Judul Materi Hanya Berformat Angka Dan Huruf',
            'title_materi.unique'=>'Judul Materi Sudah Ada',
            'file_materi.required'=>'File Materi Belum Di-isi',
            'file_materi.mimes'=>'File Materi Harus Bertipe jpg,png,pdf',
            'file_materi.max'=>'File Materi Harus Dibawah 3 MB',
            'description.max'=>'Deskripsi Kelas Terlalu Panjang (Batas : 255 Karakter)'
        ];
    }
}
