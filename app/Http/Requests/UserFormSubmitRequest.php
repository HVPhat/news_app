<?php

namespace news_app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormSubmitRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required | unique:users,email',
            'password'=>'required',
            'phone'=>'required | min:11',
        ];
    }
}
