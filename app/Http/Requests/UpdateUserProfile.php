<?php

namespace App\Http\Requests;

use App\Rules\AlphaSpaces;
use App\Rules\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateUserProfile extends FormRequest
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
    public function rules()
    {
        $userId = Auth::id();
        return [
            // 'email' => 'required|unique:users|email',
            'email' =>[
                'required',
                // 'unique:users',
                Rule::unique('users')->ignore($userId),
                'email'
            ],
            'name' => [
                'required',
                'max:50',
                new AlphaSpaces()
            ],
            'phone' => [new PhoneNumber()]
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Podany adres email jest zajęty',
            // 'name.max' => 'Maksymalna ilość znaków to: 2',
            'name.max' => 'Maksymalna ilość znaków to: :max',
            // 'phone.numeric' => 'Numer telefonu może składać się wyłącznie z cyfr nie oddzielonych spacją'
        ];
    }
}
