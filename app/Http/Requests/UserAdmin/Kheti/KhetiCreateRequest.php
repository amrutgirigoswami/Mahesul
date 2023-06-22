<?php

namespace App\Http\Requests\UserAdmin\Kheti;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class KhetiCreateRequest extends FormRequest
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

            'account_id' => 'required|unique:khetis,account_id',
            'account_holder_name' => 'required',
            'mulatvi' => 'required',
            'sarkari' => 'required',
            'local' => 'required',
            'farti' => 'required',
            'total' => 'required',
            'chhut' => 'required',
            'past_jadde' => 'required',
        ];
    }
    public function message(): array
    {
        return [
            'account_id.required' => 'ખાતા નં ફરજીયાત છે.',
            'account_holder_name.required' => 'ખાતેદારનું નામ ફરજીયાત છે.',
            'mulatvi.required' => 'મુલતવી નહિ તેવી ફરજીયાત છે.',
            'sarkari.required' => 'સરકારી ફરજીયાત છે.',
            'local.required' => 'લોકલ ફરજીયાત છે.',
            'farti.required' => 'ફરતી ફરજીયાત છે.',
            'total.required' => 'કુલ માંગણું ફરજીયાત છે.',
            'chhut.required' => 'છૂટ ફરજીયાત છે.',
            'past_jadde.required' => 'ગત વર્ષની જાદે ફરજીયાત છે.',
        ];
    }
}
