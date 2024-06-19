<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'item_name' => 'required',
            'explanation' => 'required|max:250',
            'price' => 'required|integer',
            'img_url' => 'required',
            'condition' => 'required',
            'category' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'item_name . required' => '商品名を入力してください',
            'explanation . required' => '商品の説明を入力してください',
            'explanation . max' => '商品の説明は250文字以下にしてください',
            'price . required' => '販売価格を入力してください',
            'price . integer' => '販売価格は整数を入力してください',
            'img_url . required' => '商品画像を選択してください',
            'condition . required' => '商品の状態を選択してください',
            'category . required' => 'カテゴリーを選択してください',
        ];
    }
}
