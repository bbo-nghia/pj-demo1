<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

/**
 * Class BaseRequest
 * @package App\Http\Requests\Api
 */
class BaseRequest extends FormRequest
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
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->validator->errors();

        $errorMessages = [];
        foreach ($errors->keys() as $key) {
            $message         = $errors->get($key);
            $errorMessages[] = [
                'field_target' => $key,
                'message'      => $message[0] ?: null
            ];
        }

        throw new HttpResponseException(
            response()->json(
                [
                    'meta' => [
                        'message' => 'Invalid params',
                        'code'    => Response::HTTP_FORBIDDEN,
                        'errors'  => $errorMessages
                    ]
                ],
                Response::HTTP_FORBIDDEN
            )
        );
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    protected function failedAuthorization()
    {
        return response()->json(
            [
                'meta' => [
                    'message' => 'Unauthenticated.',
                    'code'    => Response::HTTP_UNAUTHORIZED,
                ]
            ],
            Response::HTTP_UNAUTHORIZED
        );
    }
}
