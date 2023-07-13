<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        //* Dessa forma é possível centralizar a request em uma só.
        switch (strtolower($this->route()->getActionMethod())):
            case 'store':
                return [
                    'name' => 'string|required',
                    'email' => 'string|required|email',
                ];
                break;
            default:
                return [];
                break;
        endswitch;
    }

    public function messages(): array
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'email' => 'E-mail inválido',
        ];
    }
}
