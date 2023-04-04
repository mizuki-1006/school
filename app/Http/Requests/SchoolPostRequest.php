<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchoolPostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rures = [
            'name' => ['required'],
            'age'  => ['required'],
            'tel' => ['required','numeric'],
            'email' => ['required','email','unique:users'],
            'password' => ['required','min:5'],
        ];
        return $rures;
    }

    public function attributes(){
        return[
            'name' => "氏名",
            "age" => "年齢",
            "tel" => "電話番号",
            "email" => "メールアドレス",
            "password" => "パスワード",
        ];
    }
}
