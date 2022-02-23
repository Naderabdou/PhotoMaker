<?php

namespace App\Http\Requests\contact;

use Illuminate\Foundation\Http\FormRequest;

class OrederContactRequest extends FormRequest
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
           'company_name'=>'required|string',
            'type'=>'required|string',
            'phone'=>'required|string',
            'email'=>'required|string|email',
            'file'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
            'other'=>'nullable|string',
            'photo'=>'nullable|numeric',

            'services_id'=>'required',

        ];
    }
}
