<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCollectionRequest extends FormRequest
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
            'user_id'=>['required','exists:users,id'],
            'task_id'=>['required','exists:tasks,id'],
            'file_collection'=>['required','file','max:3072','mimes:jpg,jpeg,png,pdf'],
        ];
    }
    public function messages()
    {
        return[
            'user_id.required'=>'User Belum Ter-isi',
            'user_id.exists'=>'Data User Tidak Ada',
            'task_id.required'=>'Tugas Belum Ter-isi',
            'task_id.exists'=>'Data Tugas Tidak Ada',
            'file_collection.required'=>'File Tugas Belum Ter-isi',
            'file_collection.file'=>'File Harus Berformat File',
            'file_collection.max'=>'File Melebihi Batas',
            'file_collection.mimes'=>'File Harus Bertipe jpg,jpeg,png,pdf',
        ];
    }
}
