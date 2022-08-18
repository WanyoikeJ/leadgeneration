<?php

namespace App\Http\Requests\Lead;

use Illuminate\Foundation\Http\FormRequest;

class LeadRequest extends FormRequest
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
            'accounts_id'   => 'required|exists:accounts,id',
            'description'   => 'nullable|min:5',
            'stage'         => 'required|min:2',
            'source'        => 'required|min:2',
            'timeline'      => 'required|min:2',
            'startdate'     => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'accounts_id.required' => 'The account name is needed',
            'description.min' => 'Kindly describe the lead properly 😊',
        ];
    }
}
