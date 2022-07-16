<?php

namespace App\Services;

use App\Models\Address;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class AddressService
 * @package App\Services
 */
class AddressService extends BaseService
{

    /**
     * AddressService constructor.
     * @param Address $address
     */
    public function __construct(Address $address)
    {
        $this->model = $address;
    }

    /**
     * @param mixed $addressId
     * 
     * @return Address
     */
    public function findById($addressId)
    {
        return $this->model->findOrFail($addressId);
    }

    /**
     * @param int $accountId
     * @param array $data
     * 
     * @return AccountPicture
     */
    public function store($accountId, array $data)
    {
        DB::beginTransaction();
        try {
            $address = $this->model->create(
                [
                    'account_id' => $accountId,
                    'name' => $data['name'],
                    'mobile' => $data['mobile'],
                    'street_address' => $data['street_address'],
                    'city' => $data['city'] ?? '',
                    'unit' => $data['unit'] ?? '',
                    'type' => $data['type'],
                    'select' => $data['select'],
                ]
            );
        } catch (Exception $e) {
            DB::rollBack();

            throw new Exception(__('There was a problem creating your address. ' . $e->getMessage()));
        }

        DB::commit();

        return $address;
    }

    /**
     * @param mixed $addressId
     * @param mixed $data
     * 
     * @return Address
     */
    public function update($addressId, $data)
    {
        $address = $this->findById($addressId);

        DB::beginTransaction();
        try {
            if (!empty($data['name'])) {
                $address->name = $data['name'];
            }
            if (!empty($data['mobile'])) {
                $address->mobile = $data['mobile'];
            }
            if (!empty($data['street_address'])) {
                $address->street_address = $data['street_address'];
            }
            if (!empty($data['city'])) {
                $address->city = $data['city'];
            }
            if (!empty($data['unit'])) {
                $address->unit = $data['unit'];
            }
            if (!empty($data['type'])) {
                $address->type = $data['type'];
            }
            if (!empty($data['select'])) {
                $address->select = $data['select'];
            }
            $address->save();
        } catch (Exception $e) {
            DB::rollBack();

            throw new Exception(__('There was a problem updating address. ' . $e->getMessage()));
        }

        DB::commit();
        return $address;
    }

    /**
     * @param mixed $accountId
     * 
     * @return Address[]
     */
    public function getAll($accountId)
    {
        return $this->model->where('account_id', $accountId)->get();
    }
}
