<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "firstName" => "required|min:2|max:10",
            "lastName" => "required|min:2|max:10",
            "featuredImg" => "file|mimes:jpeg,png,jpg",
            "Company" => "min:2|max:20",
            "jobTitle" => "max:25",
/*            "email" => "unique:contacts,email,".$this->route('contact')->id,*/
            "phone" => "required",
            "note" => "max:50"
        ];
    }
}
