<?php

namespace App\Http\Requests\Api\v1\Address;

use App\Http\Requests\Api\BaseRequest;

/**
 * Class UpdateRequest
 * @package App\Http\Requests\Api\v1\Address
 */
class UpdateRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'regex:/^[\pL\s]+$/u'],
            'mobile' => ['required', 'string', 'min:10', 'max:10'],
            'street_address' => ['required', 'string'],
            'city' => ['sometimes', 'string'],
            'unit' => ['sometimes', 'string'],
            'mobile' => ['required', 'string'],
            'type' => ['required', 'boolean'],
            'select' => ['required', 'boolean'],
        ];
    }
}
