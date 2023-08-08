<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'thumbnail' => 'nullable|image',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Название не заполнено',
            'description.required' => 'Цитата не заполнена',
            'content.required' => 'Контент не заполнен',
            'thumbnail.image' => 'Выберите другой тип файла'
        ];
    }
}
