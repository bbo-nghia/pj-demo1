<?php

namespace App\Http\Requests\Api\v1\Picture;

use App\Http\Requests\Api\BaseRequest;

/**
 * Class UploadRequest
 * @package App\Http\Requests\Api\v1\Picture
 */
class UploadRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    /**
     * Custom Messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'image.max'   => 'The image is incorrect size.',
            'image.mimes' => 'The image is incorrect type.',
        ];
    }
}
