<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManageBookingUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'check_in' => ['required', 'max:255'],
            'check_out' => ['required', 'max:255'],
            'room_name' => ['required', 'max:255'],
            'room_number' => ['required', 'max:255'],
            'adults' => ['required', 'integer', 'min:1'],
            'children' => ['required', 'integer', 'min:0'],
            'price' => ['required', 'numeric', 'min:0'],
            'guest_name' => ['required', 'max:255'],
            'phone_number' => ['required', 'max:255'],
            'status' => ['required', 'in:checked-in,checked-out'],
            'email' => ['nullable', 'max:255', 'email', 'unique:bookings,email'],
            'notes' => ['nullable', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field may not be greater than :max characters.',
            'integer' => 'The :attribute must be an integer.',
            'numeric' => 'The :attribute must be a number.',
            'min' => 'The :attribute must be at least :min.',
            'in' => 'The selected :attribute is invalid.',
            'email' => 'Invalid email format.',
            'unique' => 'The :attribute has already been taken.',
        ];
    }
}
