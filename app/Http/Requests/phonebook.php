<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class phonebook extends FormRequest
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
    public function rules(Request $req)
    {
        return [
            'name'=>'required|min:3|max:55',
            'phone'=>'required|min:11|max:11',
            'email'=>'required|email|unique:phones,email,'.$req->id,
        ];
    }
}
