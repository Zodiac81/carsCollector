<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSeriesRequest extends FormRequest
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
            'name' => 'string|required|max:255',
            'reference' => 'string|nullable|max:255',
            'line' => 'string|required',
            'released' => 'required',
            'finished' => 'nullable',
            'description' => 'nullable|max:4000|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'A series name is required',
            'name.string'  => 'A series name must be string type',
            'name.max'  => 'A series name must contains no more 255 characters',
            'reference.max'  => 'A series reference must contains no more 255 characters',
            'reference.string'  => 'A series reference must be string type',
            'released.required'  => 'A series released year is required',
            'line.required'  => 'A series production line is required',
            'line.string'  => 'A series production line must be string type',
            'description.max'  => 'A series description must contains no more 4000 characters',

        ];
    }
}
