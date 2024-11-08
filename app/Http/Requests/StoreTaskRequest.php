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
            'class_id'=>['required', 'exists:classes,id'],
            'title_task'=>['required', 'unique:tasks,title_task'],
            'description_task'=>['nullable','alpha_num'],
            'date_task'=>['required','date']
        ];
    }

    public function messages()
    {
        return[
            'class_id.required' => 'Tugas Belum Ter-isi',
            'class_id.exists' => 'Data Tugas Tidak Ada',
            'title_task.required' => 'Judul Tugas Belum Ter-isi',
            'title_task.unique' => 'Judul Tugas Tidak Ada',
            'description.alpha_num'=>'Deskripsi Hanya Berformat Angka Dan Huruf',
            'date_task.required' => 'Tanggal Deadline Belum Ter-isi',
            'date_task.date' => 'Tanggal Deadline Berformat Tanggal',
        ];
    }
}
