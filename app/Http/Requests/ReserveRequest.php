<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReserveRequest extends FormRequest
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
            'reserve_date' => ['date','after:today'],
        ];
        return $rures;
    }

    public function attributes(){
        return[
            'reserve_date' => "予約日",
        ];
    }
}
