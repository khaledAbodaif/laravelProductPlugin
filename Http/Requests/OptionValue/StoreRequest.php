<?php

namespace Khaleds\LaravelProduct\Http\Requests\OptionValue;

use Illuminate\Foundation\Http\FormRequest;
use Khaleds\LaravelProduct\Models\Option\OptionValue;

class StoreRequest extends FormRequest
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
        //get it from config or delete theme
        return OptionValue::$rules;
    }
}