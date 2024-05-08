<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            //
            'newPost' => 'required|min:1|max:150'
        ];
    }

    public function messages() {
        return [
            'newPost.required' => '投稿内容を入力してください。',
            'newPost.min' => '１字以上で入力してください。',
            'newPost.max' => '１５０字以内で入力してください。'

        ];
    }
}
