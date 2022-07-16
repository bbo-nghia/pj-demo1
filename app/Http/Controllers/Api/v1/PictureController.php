<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Requests\Api\v1\Picture\DeleteRequest;
use App\Http\Requests\Api\v1\Picture\UploadRequest;
use App\Services\PictureService;
use Exception;
use Illuminate\Http\Response;

/**
 * Class PictureController
 * @package App\Http\Controllers\Api\v1
 */
class PictureController extends ApiBaseController
{

    /**
     * @var PictureService
     */
    protected $pictureService;

    /**
     * @param PictureService $pictureService
     */
    public function __construct(PictureService $pictureService)
    {
        $this->pictureService = $pictureService;
    }

    /**
     * @param UploadRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(UploadRequest $request)
    {
        /** @var Account $account */
        $account = auth()->user();
        $path = env('ACCOUNT_PICTURE_DIRECTORY') . $account->id;
        $image = $request->file('image');

        $newPicture = uploadImage($image, $path);

        if ($newPicture) {
            $newPicture = (object) json_decode($newPicture, true);
            $pictureData = [
                'account_id' => $account->id,
                'original_file_name' => $image->getClientOriginalName(),
                'main_file_name' => $newPicture->main_file_name,
                'thumb_file_name' => $newPicture->thumb_file_name,

            ];

            $accountPicture = $this->pictureService->store($pictureData);

            return $this->successResponse(
                [
                    'picture_id' => $accountPicture->id,
                    'account_id' => $accountPicture->account_id,
                    'original_file_name' => $accountPicture->original_file_name,
                    'main_file_name' => $accountPicture->main_file_name,
                    'thumb_file_name' => $accountPicture->thumb_file_name,
                    'main_link' => asset($newPicture->main_path),
                    'thumb_link' => asset($newPicture->thumb_path),
                    'main_path' => public_path($newPicture->main_path),
                    'thumb_path' => public_path($newPicture->thumb_path)
                ]
            );
        }

        return $this->errorResponse('File can not upload.', Response::HTTP_BAD_REQUEST);
    }

    /**
     * @param mixed $pictureId
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetch($pictureId)
    {
        try {
            /** @var Account $account */
            $account = auth()->user();
            $path = env('ACCOUNT_PICTURE_DIRECTORY') . $account->id;
            $picture = $this->pictureService->findById($pictureId);

            return $this->successResponse(
                [
                    'picture_id' => $picture->id,
                    'account_id' => $picture->account_id,
                    'original_file_name' => $picture->original_file_name,
                    'main_file_name' => $picture->main_file_name,
                    'thumb_file_name' => $picture->thumb_file_name,
                    'main_link' => asset($path . '/' . $picture->main_file_name),
                    'thumb_link' => asset($path . '/' . $picture->thumb_file_name),
                    'main_path' => public_path($path . '/' . $picture->main_file_name),
                    'thumb_path' => public_path($path . '/' . $picture->thumb_file_name)
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
            $pictures = $this->pictureService->getAll($account->id);

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
            $this->pictureService->deleteByIds($request->get('ids'));
            return $this->successResponse();
        } catch (\Exception $e) {
            return $this->errorResponse('Cannot delete pictures.', Response::HTTP_BAD_REQUEST);
        }
    }
}
