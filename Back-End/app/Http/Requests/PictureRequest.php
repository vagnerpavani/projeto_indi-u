<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PictureRequest extends FormRequest
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
            'subtitle' => 'nullable|string',
            'file' => 'required|string',
            'project_id' => 'required|integer|exists:projects,id',
        ];
      }

      if($this->isMethod('put')){
        return [
            'subtitle' => 'string',
            'file' => 'string',
            'project_id' => 'integer|exists:projects,id',
        ];
      }
    }

    public function messages()
    {
      return [
        'subtitle.string' => 'O subtítulo deve ser uma cadeia de caracteres.',
        'file.required' => 'Nenhuma imagem selecionada.',
        'file.string' => 'O caminho da imagem é inválido.',
        'project_id.required' => 'Você deve passar o projeto para essa foto.',
        'project_id.integer' => 'O ID do projeto deve ser um número inteiro.',
        'project_id.exists' => 'Esse projeto não existe.',
      ];
    }

    protected function failedValidation(Validator $validator)
    {
      throw new
      HttpResponseException(response()->json($validator->error(), 422));
    }
}
