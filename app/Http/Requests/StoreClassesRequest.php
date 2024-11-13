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
            'name_class'=>['required','alpha_num','string','unique:classes,name_class'],
            'description'=>['nullable','alpha_num'],
            'teacher_id'=>['required','exists:teachers,id']
        ];
    }
    public function messages()
    {
        return [
            'name_class.required'=>'Nama Kelas Belum Ter-isi',
            'name_class.alpha_num'=>'Nama Kelas Hanya Berformat Angka Dan Huruf',
            'name_class.string'=>'Nama Kelas Hanya Bertipe string',
            'name_class.unique'=>'Nama Kelas Sudah Ada',
            'description.alpha_num'=>'Deskripsi Hanya Berformat Angka Dan Huruf',
            'code_class.string'=>'Nama Kelas Hanya Bertipe string',
            'code_class.max'=>'Nama Kelas Melebihi batas',
            'teacher_id.required'=>'Guru Belum Ter-isi',
            'teacher_id.exists'=>'Data Guru Tidak Ada',
        ];
    }
}
