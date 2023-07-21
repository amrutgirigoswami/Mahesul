<?php

namespace App\Http\Requests\UserAdmin\Kheti;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReceiptRequest extends FormRequest
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
            'receipt_no' => ['required'],
            'receipt_date' => ['required', 'date'],
            'b_adhi' => ['required'],
            'total_demand' => ['required'],
            'total_receipt_collection' => ['required'],
            'charges_arrival' => ['nullable'],
            'total_collection' => ['nullable'],
            'chargeable' => ['nullable'],
            'remaining' => ['nullable'],
            'next_year_jadde' => ['nullable'],
        ];
    }
}
