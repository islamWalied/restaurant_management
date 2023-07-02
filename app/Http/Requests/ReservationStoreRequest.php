<?php

namespace App\Http\Requests;

use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use Illuminate\Foundation\Http\FormRequest;

class ReservationStoreRequest extends FormRequest
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
            'fname' => ["required"],
            "lname" => ["required"],
            "email" => ["required"],
            "date" => ["required","date", new DateBetween,new TimeBetween()],
            "phone" => ["required"],
            "guest_no" => ["required"],
            "table_id" => ["required"],
        ];
    }
}
