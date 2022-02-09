<?php

namespace App\Http\Requests\About;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
            'about_desc_ar'=>'required|string',
            'about_desc_en'=>'required|string',
            'client_title'=>'required|string',
            'client_img'=>'required|image|mimes:jpeg,png,jpg,gif,svg'
        ];
    }
}
