<?php

namespace App\Http\Requests\contact;

use Illuminate\Foundation\Http\FormRequest;

class ServicesContactUpdateRequest extends FormRequest
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
            'name_ar'=>'array',
            'name_en'=>'array',
            'contact_id'=>'required'

        ];
    }
}