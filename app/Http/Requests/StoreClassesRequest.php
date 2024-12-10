<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassesRequest extends FormRequest
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
        $this->merge([
            'name_class_combined' => $this->input('name_class.0') . '-' . $this->input('name_class.1'),
        ]);
    }

    public function rules(): array
    {
        return [
            'name_class.0' => ['required'],
            'name_class.1' => ['required', 'string'],
            'name_class_combined' => ['unique:classes,name_class'],
            'description' => ['nullable', 'max:255'],
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
