<?php

namespace App\Http\Requests\Player;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    //======================================================>
    public function attributes(): array
    {
        return [
            'name' => 'Name',
            'phone' => 'Mobile number',
        ];
    }
    //======================================================>
    public function rules(): array
    {
        return [
            'name' => 'required',
            'phone' => 'required|numeric|digits:10|unique:players,phone',
        ];
    }
}
