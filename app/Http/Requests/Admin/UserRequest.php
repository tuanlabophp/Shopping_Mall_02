<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserRequest extends FormRequest
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
     * @return array
     */
    public function rules(User $user)
    {
        return [
            'f_name' => 'required|max:255|min:2',
            'l_name' => 'required|max:255|min:2',
            'email' => [
                'required',
                Rule::unique('users')->ignore($user->id, 'id'),
                'email',
                'max:32',
            ],
            'phone' => 'required|numeric|min:7',
            'image' => 'mimes:jpeg,bmp,png,jpg',
            'password' => 'min:6|required',
            'confirm_password' => 'same:password',
        ];
    }
}
