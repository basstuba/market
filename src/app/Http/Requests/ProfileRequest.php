<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
        return [
            'name' => 'required',
            'postcode' => ['required', 'regex:/^[0-9]+$/', 'digits:7'],
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name . required' => 'お名前を入力してください',
            'postcode . required' => '郵便番号を入力してください',
            'postcode . regex' => '数字を入力してください',
            'postcode . digits' => '7桁の数字を入力してください',
            'address . required' => '住所を入力してください',
        ];
    }
}
