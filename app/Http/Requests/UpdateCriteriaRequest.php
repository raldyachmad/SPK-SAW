<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCriteriaRequest extends FormRequest
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
            'nama' => 'required|string|max:255',
            'bobot' => 'required|numeric|between:0,1',
            'atribut' => 'required|in:benefit,cost',
        ];
    }
    public function messages()
{
    return [
        'nama.required' => 'Nama kriteria wajib diisi.',
        'nama.string' => 'Nama kriteria harus berupa teks.',
        'nama.max' => 'Nama kriteria tidak boleh lebih dari 255 karakter.',

        'bobot.required' => 'Bobot wajib diisi.',
        'bobot.numeric' => 'Bobot harus berupa angka.',
        'bobot.between' => 'Bobot harus berada di antara 0 dan 1.',

        'atribut.required' => 'Atribut wajib dipilih.',
        'atribut.in' => 'Atribut harus berupa Benefit atau Cost.',
    ];
}
}
