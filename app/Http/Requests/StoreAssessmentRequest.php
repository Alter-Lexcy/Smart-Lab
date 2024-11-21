<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssessmentRequest extends FormRequest
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
            'task_id'=>['required','exists:tasks,id'],
            'user_id'=>['required','exists:users,id'],
            'mark_task'=>['required','numeric','max:100'],
        ];
    }
    public function messages()
{
    return [
        'task_id.required' => 'Tugas Belum Terisi',
        'task_id.exists' => 'Tugas Tidak Ada',
        'user_id.required' => 'Siswa Belum Terisi',
        'user_id.exists' => 'Siswa Tidak Ada',
        'mark_task.required' => 'Nilai Belum Terisi',
        'mark_task.numeric' => 'Nilai Harus Berformat Angka',
        'mark_task.max' => 'Nilai Melewati Batas',
    ];
}

}
