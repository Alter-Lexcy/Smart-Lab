<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTaskRequest extends FormRequest
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
            'subject_id' => ['required', 'exists:subject,id'],
            'materi_id' => ['required', 'exists:materis,id'],
            'title_task' => ['required', 'alpha_num', 'unique:tasks,title_task'],
            'file_task' => ['required', 'mimes:png,jpg,pdf', 'max:3072'],
            'date_collection' => ['required', 'date', 'after:now']
        ];
    }

    public function messages()
    {
        return [
            'class_id.required' => 'Kelas Belum Di-Pilih',
            'class_id.exists' => 'Kelas Tidak Ada',
            'subject_id.required' => 'Mata Pembelajaran Belum Di-Pilih',
            'subject_id.exists' => 'Mata Pembelajaran Tidak Ada',
            'materi_id.required' => 'Materi Belum Di-Pilih',
            'materi_id.exists' => 'Materi Tidak Ada',
            'title_task.required' => 'Judul Tugas Belum Di-Isi',
            'title_task.alpha_num' => 'Judul Tugas Harus Berformat Angka Dan Huruf',
            'title_task.unique' => 'Judul Tugas Sudah Ada',
            'file_task.required' => 'Judul Tugas Sudah Ada',
            'file_task.mimes' => 'Judul Tugas Harus Bertipe png,jpg,pdf',
            'file_task.max' => 'Judul Tugas Melewati batas (Batas: 3MB)',
            'date_collection.required' => 'Tanggal Pengumpulan Belum Di-Isi',
            'date_collection.after' => 'Tanggal Harus Setelah Hari ini',
        ];
    }
}
