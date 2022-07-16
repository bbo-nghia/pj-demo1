<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Requests\Api\v1\Address\UpdateRequest;
use App\Http\Requests\Api\v1\Address\StoreRequest;
use App\Services\AddressService;
use Exception;
use Illuminate\Http\Response;

/**
 * Class AddressController
 * @package App\Http\Controllers\Api\v1
 */
class AddressController extends ApiBaseController
{

    /**
     * @var AddressService
     */
    protected $addressService;

    /**
     * @param AddressService $addressService
     */
    public function __construct(AddressService $addressService)
    {
        $this->addressService = $addressService;
    }

    /**
     * @param StoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        try {
            /** @var Account $account */
            $account = auth()->user();
            $address = $this->addressService->store($account->id, $request->all());

            return $this->successResponse(
                [
                    'address' => $address->id,
                    'name' => $address->name,
                    'mobile' => $address->mobile,
                    'street_address' => $address->street_address,
                    'city' => $address->city,
                    'unit' => $address->unit,
                    'type' => $address->type,
                    'select' => $address->select
                ]
            );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @param int $addressId
     * @param UpdateRequest $request
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($addressId, UpdateRequest $request)
    {
        try {
            $address = $this->addressService->update($addressId, $request->all());

            return $this->successResponse(
                [
                    'address' => $address->id,
                    'name' => $address->name,
                    'mobile' => $address->mobile,
                    'street_address' => $address->street_address,
                    'city' => $address->city,
                    'unit' => $address->unit,
                    'type' => $address->type,
                    'select' => $address->select
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
            $addressList = $this->addressService->getAll($account->id);

            $items = [];
            foreach ($addressList as $address) {
                $items[] = [
                    'address' => $address->id,
                    'name' => $address->name,
                    'mobile' => $address->mobile,
                    'street_address' => $address->street_address,
                    'city' => $address->city,
                    'unit' => $address->unit,
                    'type' => $address->type,
                    'select' => $address->select
                ];
            }

            return $this->successResponse($items);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @param DeleteRequest $request
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($addressId)
    {
        try {
            $this->addressService->deleteById($addressId);
            return $this->successResponse();
        } catch (\Exception $e) {
            return $this->errorResponse('Cannot delete pictures.', Response::HTTP_BAD_REQUEST);
        }
    }
}
