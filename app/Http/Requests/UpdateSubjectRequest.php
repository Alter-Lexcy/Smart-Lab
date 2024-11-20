<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSubjectRequest extends FormRequest
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
            'name_subject' => [
                'required',
                'string',
                Rule::unique('subjects', 'name_subject')->ignore($this->route('subject'))
            ]
        ];
    }

    public function messages()
    {
        return [
            'name_subject.required'=>'Nama Mata Pembelajaran Belum Di-isi',
            'name_subject.string'=>'Nama Mata Pembelajaran Harus Bertipe Huruf',
            'name_subject.unique'=>'Nama Mata Pembelajaran Sudah Ada'
        ];
    }
}
