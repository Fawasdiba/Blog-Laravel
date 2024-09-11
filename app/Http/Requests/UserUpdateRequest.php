<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'                  => 'required|min:3',
            'email'                 => 'required|email',
            'img'                   => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'password'              => 'nullable|min:8|confirmed',
            'password_confirmation' => 'nullable|min:8|required_with:password'
        ];
    }
}
