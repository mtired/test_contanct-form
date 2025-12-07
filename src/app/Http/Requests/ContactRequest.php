<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'first_name' => 'required|string|max:8',
            'last_name' => 'required|string|max:8',
            'gender' => 'required',
            'email' => 'required|email',
            'tel1' => ['required', 'alpha_num', 'regex:/^[0-9]{1,5}$/',],
            'tel2' => ['required', 'alpha_num', 'regex:/^[0-9]{1,5}$/',],
            'tel3' => ['required', 'alpha_num', 'regex:/^[0-9]{1,5}$/',],
            'address' => 'required|string',
            'category_id' => 'required',
            'detail' => 'required|string|max:120',
        ];
    }
    public function messages()
    {
        return [
            'first_name.required' => '姓を入力してください',
            'first_name.string'   => 'お名前は文字列で入力してください',
            'first_name.max'      => 'お名前は最大8文字まで入力できます',

            'last_name.required' => '名を入力してください',
            'last_name.string'   => 'お名前は文字列で入力してください',
            'last_name.max'      => 'お名前は最大8文字まで入力できます',

            'gender.required' => '性別を選択してください',

            'email.required' => 'メールアドレスを入力してください',
            'email.email'    => 'メールアドレスはメール形式で入力してください',

            'tel1.required' => '電話番号を入力してください',
            'tel1.alpha_num' => '電話番号は 半角英数字で入力してください',
            'tel1.regex' => '電話番号は 5桁まで数字で入力してください',

            'tel2.required' => '電話番号を入力してください',
            'tel2.alpha_num' => '電話番号は 半角英数字で入力してください',
            'tel2.regex' => '電話番号は 5桁まで数字で入力してください',

            'tel3.required' => '電話番号を入力してください',
            'tel3.alpha_num' => '電話番号は 半角英数字で入力してください',
            'tel3.regex' => '電話番号は 5桁まで数字で入力してください',

            'address.required' => '住所を入力してください',

            'category_id.required' => 'お問い合わせの種類を選択してください',

            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max'      => 'お問い合わせ内容は120文字以内で入力してください',
        ];
    }
}
