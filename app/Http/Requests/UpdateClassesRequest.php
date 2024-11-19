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
            'subject_id'=>['required','exists:subject,id'],
            'name_class'=>['required','alpha_num',Rule::unique('classes','name_class')->ignore($this->route('class'))],
            'description'=>['max:255']
        ];
    }
    public function messages()
    {
        return [
            'subject_id.required'=>'Mata Pembelajaran Belum Di-pilih',
            'subject_id.exists'=>'Mata Pembelajaran Tidak Ada',
            'name_class.required'=>'Nama Kelas Belum Di-isi',
            'name_class.alpha_num'=>'Nama Kelas Hanya Berformat Huruf Dan Angka',
            'name_class.unique'=>'Nama Kelas Sudah Ada',
            'description.max'=>'Deskripsi Kelas Terlalu Panjang (Batas : 255 Karakter)'
        ];
    }
}
