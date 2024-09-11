<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
    public function rules()
{
    return [
        'title'         => 'required',
        'category_id'   => 'required',
        'desc'          => 'required',
        'img'           => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
        'status'        => 'required',
        'publish_date'  => 'required',
    ];
}
}

