<?php

namespace App\Http\Requests\UserAdmin\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'email|required',
            'village_name' => 'nullable',
            'taluka_name' => 'nullable',
            'district_name' => 'nullable',
            'full_address' => 'nullable',
            'pincode' => 'nullable',
            'contact_no' => 'nullable',
            'profile_image' => 'nullable',
        ];
    }
}
