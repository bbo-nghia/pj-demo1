<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Requests\Api\v1\Account\UpdateRequest;
use App\Services\AccountService;
use Exception;
use Illuminate\Http\Response;

/**
 * Class AccountController
 * @package App\Http\Controllers\Api\v1
 */
class AccountController extends ApiBaseController
{

    /**
     * @var AccountService
     */
    protected $accountService;

    /**
     * @param AccountService $accountService
     */
    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    /**
     * @param UpdateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRequest $request)
    {
        try {
            /** @var Account $account */
            $account = auth()->user();
            $account = $this->accountService->update($account->id, $request->all());

            return $this->successResponse(
                [
                    'name' => $account->name,
                    'mobile' => $account->mobile,
                    'birthday' => $account->birthday,
                    'mail_flag' => $account->mail_flag
                ]
            );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetch()
    {
        try {
            /** @var Account $account */
            $account = auth()->user();

            return $this->successResponse(
                [
                    'name' => $account->name,
                    'mobile' => $account->mobile,
                    'birthday' => $account->birthday,
                    'mail_flag' => $account->mail_flag
                ]
            );
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }
}
