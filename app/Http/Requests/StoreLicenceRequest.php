<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLicenceRequest extends FormRequest
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
            'kachari_id'      => ['required'],
            'station_id'      => ['required'],
            'licence_type_id' => ['required'],
            'plot_no'         => ['nullable'],
            'jl_no'           => ['nullable'],
            'dag_no'          => ['nullable'],
            'district_id'     => ['required'],
            'upzila_id'       => ['required'],
            'mouza_id'        => ['required'],
            'licence_no'      => ['required','unique:licences,licence_no'],
            'land_height'     => ['nullable'],
            'land_width'      => ['nullable'],
            'land_total'      => ['required'],
            'validity'        => ['required'],
            'north'           => ['nullable'],
            'south'           => ['nullable'],
            'east'            => ['nullable'],
            'west'            => ['nullable'],
            'licence_holder'  => ['required'],
            'father_name'     => ['required'],
            'address'         => ['required'],
            'nid'             => ['required'],
            'date_of_birth'   => ['required'],
            'mobile'          => ['required'],
            'image'           => ['nullable'],
        ];
    }
}
