<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
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
            'lesson_name' => ['required'],
            'content'  => ['required'],
            'price' => ['required'],
        ];
        return $rures;
    }

    public function attributes(){
        return[
            'lesson_name' => "レッスン名",
            "content" => "内容",
            "price" => "料金",
        ];
    }
}
