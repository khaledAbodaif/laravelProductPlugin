<?php

namespace Khaleds\LaravelProduct\Http\Requests\Option;

use Illuminate\Foundation\Http\FormRequest;
use Khaleds\LaravelProduct\Models\Option\Option;

class UpdateRequest extends FormRequest
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
        $rules=Option::$rules;
        $rules['id']='required|numeric|exists:options,id';
        return $rules;
;
    }
}
