<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Subject extends FormRequest
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
            'name_subject'=>['required','unique:subject,name_subject','string']
        ];
    }

    public function messages()
    {
        return[
            'name_subject.required'=>'Nama Mata Pembelajaran Belum Di-sisi',
            'name_subject.unique'=>'Nama Mata Pembelajaran Sudah Ada',
            'name_subject.unique'=>'Nama Mata Pembelajaran Harus Berformat Huruf',
        ];
    }
}
