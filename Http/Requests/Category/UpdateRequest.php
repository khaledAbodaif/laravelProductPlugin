<?php

namespace Khaleds\LaravelProduct\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Khaleds\LaravelProduct\Models\Category\Category;

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
        $rules=Category::$rules;
        $rules['id']='required|numeric|exists:categories,id';
        return $rules;
;
    }
}
