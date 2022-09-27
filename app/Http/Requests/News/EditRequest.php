<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:3','max:100'],
            'category_id' => ['required', 'numeric', 'exists: categories,id'],
            'description' => ['required', 'string', 'min:3','max:200'],
            'author' => ['required', 'string', 'min:2','max:30'],
            'status' => ['required', 'string', 'min:5', 'max:7'],
            'image' => ['nullable', 'image', 'mimes:jpg,png'],
            'released_at' => ['required', 'date']
        ];
    }
}
