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

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchAll()
    {
        try {
            /** @var Account $account */
            $account = auth()->user();
            $path = env('ACCOUNT_PICTURE_DIRECTORY') . $account->id;
            $pictures = $this->accountService->getAll($account->id);

            $images = [];
            foreach ($pictures as $picture) {
                $images[] = [
                    'picture_id' => $picture->id,
                    'account_id' => $picture->account_id,
                    'original_file_name' => $picture->original_file_name,
                    'main_file_name' => $picture->main_file_name,
                    'thumb_file_name' => $picture->thumb_file_name,
                    'main_link' => asset($path . '/' . $picture->main_file_name),
                    'thumb_link' => asset($path . '/' . $picture->thumb_file_name),
                    'main_path' => public_path($path . '/' . $picture->main_file_name),
                    'thumb_path' => public_path($path . '/' . $picture->thumb_file_name)
                ];
            }

            return $this->successResponse($images);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @param DeleteRequest $request
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(DeleteRequest $request)
    {
        try {
            $this->accountService->deleteByIds($request->get('ids'));
            return $this->successResponse();
        } catch (\Exception $e) {
            return $this->errorResponse('Cannot delete pictures.', Response::HTTP_BAD_REQUEST);
        }
    }
}
