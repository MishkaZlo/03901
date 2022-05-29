<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarSearchRequest extends FormRequest
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
            'query' => 'nullable|string',
            'filter' => 'nullable|array',
            'filter.only_using' => 'nullable|string|in:Y,y,N,n',
            'sort_mode' => 'nullable|in:asc,desc',
            'sort' => 'nullable|in:mark,model,start_time',
            'query_params' => 'array|required_with:query,null',
            'query_params.*' => 'in:mark,model,driver_name',

        ];
    }
}
