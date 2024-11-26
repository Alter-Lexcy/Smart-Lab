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
    public function rules(): array
    {
        return [
            'name_class'=>['required','string','unique:classes,name_class'],
            'description'=>['max:255']
        ];
    }
    public function messages()
    {
        return [
            'name_class.required'=>'Nama Kelas Belum Di-isi',
            'name_class.unique'=>'Nama Kelas Sudah Ada',
            'description.max'=>'Deskripsi Kelas Terlalu panjang (Batas : 255 Karakter)'
        ];
    }
}
