<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

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
    public function rules()
    {
        if ($this->isMethod('post')){
            return [
                'name' => 'required|string',
                'username' => 'required|string|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
                'repository' => 'url|nullable',
                'projects_done' => 'integer|nullable',
                'birthday' => 'string|nullable|max:10|min:10',
                'language' => 'string',
                'country' => 'string|nullable',
                'phone_number' => 'integer|nullable',
                'description' => 'string|nullable',
                'picture' => 'string|nullable',
            ];
        }
        if ($this->isMethod('put')){
            return [
                'name' => 'string',
                'username' => 'string|unique:users',
                'email' => 'email|unique:users',
                'password' => 'min:8',
                'repository' => 'url|nullable',
                'projects_done' => 'integer|nullable',
                'birthday' => 'string|nullable',
                'language' => 'string',
                'country' => 'string|nullable',
                'phone_number' => 'integer|nullable',
                'description' => 'string|nullable',
                'picture' => 'string|nullable',
            ];
        }
    }

    public function messages(){
        return [
        'name.required' => 'O nome é obrigatorio',
        'username.required' => 'O username é obrigatorio',
        'username.unique' => 'Username já está em uso.',
        'email.email'=> 'Por favor insira em formato de email exemplo@exemplo.com',
        'email.unique' => 'Esse email já foi usado.',
        'email.required' => 'O email é obrigatorio',
        'password.min' => 'Insira uma senha de pelo menos 8 characteres',
        'password.required'=> 'A senha é necessaria',
        'repository.url' => 'Insira um link url https:// www.exemplo.com',
        'projects_done.integer' => 'Por favor insira um número.',
        'phone_number.integer'=> 'Por favor insira apenas números',
        ];
    }

    protected function failedValidation(Validator $validator){
        throw new
        HttpResponseException(response()->json($validator->errors(),422));
    }
}
