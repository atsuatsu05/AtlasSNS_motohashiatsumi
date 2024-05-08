<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()//リクエストが認可されるかどうかを決定するためにある
    {
        return true;//戻り値としてtrue（許可）またはfalse（拒否）を返す必要がある
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()//バリデーション用の配列を戻り値として定義する
    {
        return [
            //
            'username' => 'required|min:2|max:12',
            'mail' => 'required|unique:users,mail,'.Auth::user()->id.',id|email|min:5| max:40',
            'password' => 'required|alpha-num|min:8|max:20|confirmed',
            // 'password_confirmation' => 'required|alpha-num|min:8|max:20',
            'bio' => 'max:150',
            'images' => 'image|mimes:jpeg,png,bmp,gif,svg'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => '*ユーザー名は必須です。',
            'username.min' => '*ユーザー名は2〜12字以内でご入力ください。',
            'username.max' => '*ユーザー名は2〜12字以内でご入力ください。',
            'mail.required' => '*メールアドレスは必須です。',
            'mail.unique' => '*このメールアドレスはすでに登録されています。',
            'mail.email' => '*メール形式でご入力ください。',
            'mail.min' => '*メールアドレスは5〜40字以内でご入力ください。',
            'mail.max' => '*メールアドレスは5〜40字以内でご入力ください。',
            'password.required' => '*パスワードは必須です。',
            'password.alpha-num' => '*パスワードは英数字でご入力ください。',
            'password.min' => '*パスワードは8〜20字以内でご入力ください。',
            'password.max' => '*パスワードは8〜20字以内でご入力ください。',
            'password.confirmed' => '*パスワードが一致していません。',
            'password_confirmation.required' => '*パスワード確認は必須です。',
            'password_confirmation.alpha-num' => '*パスワード確認は英数字でご入力ください。',
            'password_confirmation.min' => '*パスワードは8〜20字以内でご入力ください。',
            'password_confirmation.max' => '*パスワードは8〜20字以内でご入力ください。',
            'images.mines' => '*画像はjpeg,png,bmp,gif,svg形式にしてください。'
        ];
    }
}
