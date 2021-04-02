<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduitFormRequest extends FormRequest
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
            "designation"=>"required|min:5|max:255",
            "pays"=>"required|min:3|max:255",
            "prix"=>"required|digits_between:2,5",
            "like"=>"required|digits_between:1,2",
            "poids"=>"required|digits_between:1,2",
            "description"=>"required|min:5|max:255",
            "image"=>"file|mimes:png,jpg,jpeg,bmp,svg|nullable",
        ];
    }
}
