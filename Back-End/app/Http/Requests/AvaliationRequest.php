<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Avaliation;

class AvaliationRequest extends FormRequest
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
              'comment' => 'required|string',
              'grade' => 'required|integer',
              'id_user_measured' => 'required|integer|exists:users,id',
              'date' => 'nullable|date',
          ];
      }
      if ($this->isMethod('put')){
          return [
              'comment' => 'string',
              'grade' => 'integer',
              'id_user_measurer' => 'integer|exists:users,id',
              'id_user_measured' => 'integer|exists:users,id',
          ];
      }
    }

    public function messages(){
      return [
      'comment.required' => 'O comentário é obrigatorio',
      'grade.required' => 'A nota é obrigatoria',
      'id_user_measurer.required' => 'O seu ID é obrigatório.',
      'id_user_measured.required'=> 'O ID é obrigatório',
      'id_user_measurer.exists' => 'Esse usuário não existe.',
      'id_user_measured.exists' => 'Esse usuário não existe',
      ];
    }

    protected function failedValidation(Validator $validator){
      throw new HttpResponseException(response()->json($validator->errors(),422));
    }
}
