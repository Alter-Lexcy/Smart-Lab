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
            'collection_id'=>['required','exists:collections,id'],
            'mark_task'=>['required','numeric','max:100'],
        ];
    }
    public function messages()
    {
        return [
            'collection_id.required'=>'Pengumpulan Nilai Belum Ter-isi',
            'collection_id.exists'=>'Pengumpulan Nilai Tidak Ada',
            'mark_task.required'=>'Nilai Belum Ter-isi',
            'mark_task.numeric'=>'Nilai Harus Berformat Angka',
            'mark_task.max'=>'Nilai Melewati Batas',
        ];
    }
}
