<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'nullable|min:3|max:80',
            'short_text'=>'nullable|max:60|min:3',
            'content'=>'nullable|min:20',
            'photo'=>'nullable|mimes:jpeg,jpg,png'
        ];
    }
}
