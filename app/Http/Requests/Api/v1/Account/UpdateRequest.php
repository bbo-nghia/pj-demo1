<?php

namespace App\Http\Requests\Api\v1\Account;

use App\Http\Requests\Api\BaseRequest;

/**
 * Class UpdateRequest
 * @package App\Http\Requests\Api\v1\Account
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
            'birthday' => ['required', 'date', 'date_format:Y-m-d', 'before:today'],
            'mobile' => ['required', 'string', 'min:10', 'max:10'],
            'mail_flag' => ['required', 'boolean'],
        ];
    }
}
