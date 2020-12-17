<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() :bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() :array
    {
        return [
            'name' => 'string|required|min:4|max:255',
            'description' => 'nullable|max:1000|string',
        ];
    }

    /**
     * @return array
     */
    public function messages() :array
    {
        return [
            'name.required' => 'A category name is required',
            'name.string'  => 'A category name must be string type',
            'name.min'  => 'A category name must contains at least 4 characters',
            'name.max'  => 'A category name must contains no more 255 characters',
            'description.max'  => 'A category description must contains no more 1000 characters'
        ];
    }
}
