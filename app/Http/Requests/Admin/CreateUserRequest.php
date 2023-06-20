<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
        return [
            'name' => 'required',
            'village_name' => 'required',
            'taluka_name' => 'required',
            'district_name' => 'required',
            'contact_no' => 'required',
            'email' => 'required|email',
            'profile_image' => 'nullable',
            'full_address' => 'nullable',
            'pincode' => 'nullable',
            'password' => 'nullable',
        ];
    }
}
