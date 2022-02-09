<?php

namespace App\Http\Requests\About;

use Illuminate\Foundation\Http\FormRequest;

class AboutUpdateRequest extends FormRequest
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
            'about_desc_ar'=>'string',
            'about_desc_en'=>'string',
            'client_title'=>'string',
            'client_img'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg,'
        ];
    }
}
