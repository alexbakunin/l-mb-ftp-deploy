<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Введите Имя',
            'email.required' => 'Заполните поле email',
            'email.email' => 'Поле email должно иметь формат email',
            'email.unique' => 'Такой email уже существует',
            'password.required' => 'Поле Пароль не заполнено',
            'password.confirmed' => 'Пароли должны совпадать',
        ];
    }
}
