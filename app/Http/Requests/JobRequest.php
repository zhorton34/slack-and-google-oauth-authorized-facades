<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            'title' => 'required|string',
            'notes' => 'nullable|string',
            'source' => 'required|string',
            'link' => 'nullable|string',
            'start_length' => 'nullable|integer',
            'end_length' => 'nullable|integer',
            'length_period' => 'nullable',
            'status' => 'required',
            'date_discovered' => 'required|date',
            'payment_type' => 'required',
            'payment_amount' => 'nullable',
            'due_date' => 'nullable|date',
            'rating' => 'required|integer'
        ];
    }
}
