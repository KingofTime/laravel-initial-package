<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ResourceRequest extends FormRequest
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

    public function rulesFromPost()
    {
        return [];
    }

    public function rulesFromPut()
    {
        return [];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->method() == 'POST') {
            return $this->rulesFromPost();
        } else if ($this->method() == 'PUT') {
            return $this->rulesFromPut();
        }

        return [];
    }

    public function failedValidation(Validator $validator)
    {
        $errors = $validator->errors(); // Here is your array of errors
        $response = response()->json([
            "message" => "Erro no envio de dados",
            "details" => $errors->messages()
        ], 422);
        throw new HttpResponseException($response);
    }

}
