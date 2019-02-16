<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Project;

class ProjectRequest extends FormRequest
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
      if($this->isMethod('post')){
        return [
            'name' => 'required|string|unique:projects,name',
            'description' => 'nullable|string',
            'user_id' => 'required|integer|exists:users,id',
        ];
      }

      if($this->isMethod('put')){
        return [
            'name' => 'string|unique:projects,name,',
            'description' => 'string',
            'user_id' => 'integer|exists:users,id',
        ];
      }
    }

    public function messages()
    {
      return [
        'name.required' => 'O nome do projeto deve ser preenchido.',
        'name.string' => 'O nome do projeto deve ser uma cadeia de caracteres.',
        'description.string' => 'A descrição do projeto deve ser uma cadeia de caracteres.',
        'user_id.required' => 'O ID do criador do projeto deve ser passado.',
        'user_id.integer' => 'O ID do criador deve ser um número inteiro.',
        'user_id.exists' => 'Esse usuário não existe.',
        'name.unique' => 'Esse projeto já existe.',
      ];
    }

    protected function failedValidation(Validator $validator)
    {
      throw new
      HttpResponseException(response()->json($validator->errors(), 422));
    }
}
