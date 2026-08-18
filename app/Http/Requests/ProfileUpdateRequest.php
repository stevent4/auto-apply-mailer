<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],

            'birth_place' => ['required', 'string', 'max:100'],
            'birth_date'  => ['required', 'date'],
            'education'   => ['required', 'string', 'max:255'],
            'address'     => ['required', 'string', 'max:1000'],
            'phone'       => ['required', 'string', 'max:30'],

        ];
    }

    public function messages(): array
    {
        return [

            'name.required' =>
            'Nama lengkap wajib diisi.',

            'email.required' =>
            'Email wajib diisi.',

            'email.email' =>
            'Format email tidak valid.',

            'email.unique' =>
            'Email tersebut sudah digunakan.',

            'birth_date.date' =>
            'Format tanggal lahir tidak valid.',

        ];
    }
}
