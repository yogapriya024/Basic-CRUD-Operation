<?php

namespace App\Http\Requests\Admin;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FollowerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $user = ($this->id) ? User::find($this->id) : null;
        $userId = ($user) ? $user->id : null;
        $common= [
            'firstname' => ['required', 'max:25'],
            'lastname' =>  ['required', 'max:25'],
            'email'=> ['required', 'email', Rule::unique('users', 'email')->ignore($userId)],
            'mobile'=> ['required','numeric'],
            'address1'=>['required'],
            'city'=> ['required', 'string'],
            'state'=> ['required', 'string'],
            'country'=> ['required', 'string'],
            'zipcode'=>['required','numeric','digits_between:5,8'],
            'image' => ['required','max:2048']
        ];
        return $common;
    }

    public function messages()
    {
        return [
            'firstname.required' => 'Firstname name is required',
            'firstname.max' => 'Firstname name must not exceed the limit',
            'lastname.required' => 'Lastname name is required',
            'lastname.max' => 'Lastname name must not exceed the limit',
            'slug.required' => 'Slug is required',
            'slug.max' => 'Slug name must not exceed the limit',
            'description.required' => 'Description is required',
            'description.max' => 'Description name must not exceed the limit',
            'email.required'=>'Email is required',
            'email.email'=>'Enter the email in correct format',
            'email.unique'=>'Email is already exits',
            'address1.required'=>'Address1 is required',
            'address1.string'=>'Address1 should be given in string',
            'zipcode.required'=>'Zipcode is required',
            'zipcode.integer'=>'Zipcode must be a number',
            'zipcode.digits'=>'Zipcode must be within 5 numbers',
            'city.required'=>'City is required',
            'city.string'=>'Enter the correct city',
            'state.required'=>'State is required',
            'state.string'=>'Enter the correct state',
            'country.required'=>'Country is required',
            'country.string'=>'Enter the correct city',
            'mobile.required'=>'Mobile is required',
            'mobile.integer'=>'Mobile must be a number',
            'image.required' => 'Team Logo is required',
            'image.max' => 'The file size should be 2MB'
        ];
    }
}
