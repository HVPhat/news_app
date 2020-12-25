<?php

namespace news_app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaiVietFormSubmit extends FormRequest
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
            'hinh_anh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tieu_de' => 'required',
            'noi_dung' => 'required',
        ];
    }
}
