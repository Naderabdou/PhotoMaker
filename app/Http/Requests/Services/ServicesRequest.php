<?php

namespace App\Http\Requests\Services;

use Illuminate\Foundation\Http\FormRequest;

class ServicesRequest extends FormRequest
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
            'title_ar'=>'string|required',
            'title_en'=>'string|required',
            'desc_ar'=>'string|required',
            'desc_en'=>'string|required'
        ];
    }
}
