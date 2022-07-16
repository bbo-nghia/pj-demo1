<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

/**
 * Class ApiBaseController
 * @package App\Http\Controllers\Api
 */
class ApiBaseController extends Controller
{

    const PAGE_LIMIT = 10;

    /**
     * @param       $message
     * @param       $code
     * @param array $errors
     * @return \Illuminate\Http\JsonResponse
     */
    protected function errorResponse($message, $code, array $errors = [])
    {
        $meta = [
            'success' => false,
            'message' => $message,
            'code'    => $code
        ];
        if (!empty($errors)) {
            $meta['errors'] = $errors;
        }

        return response()->json($meta, $code);
    }

    /**
     * @param array $data
     * @param array $meta
     * @return \Illuminate\Http\JsonResponse
     */
    protected function successResponse(array $data = [], array $meta = [])
    {
        if (empty($meta['code'])) {
            $meta['code'] = Response::HTTP_OK;
        }

        return response()->json(
            [
                'success' => true,
                'data' => $data,
                'meta' => $meta
            ],
            Response::HTTP_OK
        );
    }

    /**
     * @param $fieldTarget
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function fieldErrorResponse($fieldTarget, $message)
    {
        return response()->json(
            [
                'meta' => [
                    'message' => 'Invalid params',
                    'code'    => Response::HTTP_FORBIDDEN,
                    'errors'  => [
                        'field_target' => $fieldTarget,
                        'message'      => $message
                    ]
                ]
            ],
            Response::HTTP_FORBIDDEN
        );
    }
}
