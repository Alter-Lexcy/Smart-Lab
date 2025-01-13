<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
            'class_id'=>['required','exists:classes,id'],
            'materi_id'=>['required','exists:materis,id'],
            'title_task'=>['required','string','unique:tasks,title_task'],
            'description_task'=>['max:500'],
            'date_collection'=>['required','date','after:now']
        ];
    }

    public function messages()
    {
        return[
            'class_id.required'=>'Kelas Belum Di-Pilih',
            'class_id.exists'=>'Kelas Tidak Ada',
            'materi_id.required'=>'Materi Belum Di-Pilih',
            'materi_id.exists'=>'Materi Tidak Ada',
            'title_task.required'=>'Judul Tugas Belum Di-Isi',
            'title_task.string'=>'Judul Tugas Harus Berformat String',
            'title_task.unique'=>'Judul Tugas Sudah Ada',
            'file_task.required'=>'File Tugas Belum Di-isi',
            'file_task.mimes'=>'File Tugas Harus Bertipe png,jpg,pdf',
            'file_task.max'=>'File Tugas Melewati batas (Batas: 3MB)',
            'description_task.max'=>'Deskripsi Sudah Melebihi Karakter',
            'date_collection.required'=>'Tanggal Pengumpulan Belum Di-Isi',
            'date_collection.after'=>'Tanggal Harus Setelah Hari ini',
        ];
    }
}
