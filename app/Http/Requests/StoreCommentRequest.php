<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
            'class_id'=>['required','exists:classes,id'],
            'content'=>['required']
        ];
    }
    public function messages()
    {
        return [
            'user_id.required'=>'User Belum Ter-isi',
            'user_id.exists'=>'Data User Tidak Ada',
            'class_id.required'=>'Tugas Belum Ter-isi',
            'class_id.exists'=>'Data Tugas Tidak Ada',
        ];
    }
}
