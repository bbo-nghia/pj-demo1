<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\Api\BaseRequest;

/**
 * Class LoginRequest
 * @package App\Http\Requests\Api\Auth
 */
class LoginRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'authentication_type' => 'required|string|in:facebook,google',
            'app_uid'             => 'required|string|max:255',
            'access_token'        => 'required|string|max:255',
        ];
    }
}
