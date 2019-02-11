<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class WorkRequest extends FormRequest
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
            'duty' => 'required|string',
            'user_id' => 'nullable|integer|exists:users,id',
            'project_id' => 'required|integer|exists:projects,id',
        ];
      }

      if($this->isMethod('put')){
        return [
            'duty' => 'string',
            'user_id' => 'integer|exists:users,id',
            'project_id' => 'integer|exists:projects,id',
        ];
      }
    }

    public function messages(){
        return [
          'duty.string' => 'A função deve ser uma cadeia de caracteres.',
          'duty.required' => 'A função deve ser preenchida.',
          'user_id.integer' => 'O ID do usuário deve ser um número inteiro.',
          'user_id.exists' => 'Esse usuário não existe.',
          'project_id.integer' => 'O ID do projeto deve ser um número inteiro.',
          'project_id.exists' => 'Esse projeto não existe.',
        ];
    }

    protected function failedValidation(Validator $validator){
      throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
