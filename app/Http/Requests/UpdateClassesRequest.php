<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClassesRequest extends FormRequest
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
            'name_class' => [
                'required','string',Rule::unique('classes','name_class')->ignore($this->route('class'))
            ],
            'description' => 'nullable|string',
        ];
    }
    public function messages()
    {
        return [
            'name_class.required' => 'Nama Kelas Belum Di-isi',
            'name_class.string' => 'Nama Kelas Harus Berformat String',
            'name_class.unique' => 'Nama Kelas Sudah Ada',
            'description.max' => 'Deskripsi Kelas Terlalu Panjang (Batas : 255 Karakter)'
        ];
    }
}
