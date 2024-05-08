<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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

        ];
    }

    public function messages() {
        return [

        ];
    }
}
