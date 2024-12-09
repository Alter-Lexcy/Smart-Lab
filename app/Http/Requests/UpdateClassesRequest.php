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
    protected function prepareForValidation()
    {
        // Gabungkan name_class[0] dan name_class[1] sebelum validasi
        $this->merge([
            'name_class_combined' => $this->input('name_class.0') . '-' . $this->input('name_class.1'),
        ]);
    }
    public function rules(): array
    {
        return [
            'name_class.0' => ['required', 'string'], // Validasi untuk angkatan
            'name_class.1' => ['required', 'string'], // Validasi untuk nama kelas
            'description' => ['nullable', 'max:255'],
            'name_class_combined' => [
                'unique:classes,name_class,' . $this->route('class'), // Abaikan ID saat update
            ],
        ];
    }
    public function messages()
    {
        return [
            'name_class.0.required' => 'Angkatan belum diisi.',
            'name_class.1.required' => 'Nama kelas belum diisi.',
            'name_class_combined.unique' => 'Kombinasi angkatan dan nama kelas sudah ada.',
            'description.max' => 'Deskripsi kelas terlalu panjang (maksimal 255 karakter).',
        ];
    }
}
