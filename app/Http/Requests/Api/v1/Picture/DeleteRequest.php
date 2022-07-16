<?php

namespace App\Http\Requests\Api\v1\Picture;

use App\Http\Requests\Api\BaseRequest;

/**
 * Class DeleteRequest
 * @package App\Http\Requests\Api\v1\Picture
 */
class DeleteRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'integer',
        ];
    }

    /**
     * Custom Messages
     *
     * @return array
     */
    public function messages()
    {
        return [];
    }
}
