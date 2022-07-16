<?php

namespace App\Services;

use App\Exceptions\GeneralException;
use App\Models\AccountPicture;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class PictureService
 * @package App\Services
 */
class PictureService extends BaseService
{

    /**
     * PictureService constructor.
     * @param Picture $picture
     */
    public function __construct(AccountPicture $picture)
    {
        $this->model = $picture;
    }

    /**
     * @param mixed $pictureIds
     * 
     * @return AccountPicture
     */
    public function findById($pictureId)
    {
        return $this->model->findOrFail($pictureId);
    }

    /**
     * @param array $data
     * 
     * @return AccountPicture
     */
    public function store(array $data)
    {
        DB::beginTransaction();
        try {
            $picture = $this->model->create(
                [
                    'account_id' => $data['account_id'],
                    'original_file_name' => $data['original_file_name'],
                    'main_file_name' => $data['main_file_name'],
                    'thumb_file_name' => $data['thumb_file_name']
                ]
            );
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating your picture. ' . $e->getMessage()));
        }

        DB::commit();

        return $picture;
    }

    /**
     * @param mixed $accountId
     * 
     * @return AccountPicture[]
     */
    public function getAll($accountId)
    {
        return $this->model->where('account_id', $accountIdxx)->get();
    }

    /**
     * @param mixed $ids
     * 
     * @return boolean
     */
    public function deleteByIds($ids)
    {
        return $this->model->whereIn('id', $ids)->delete();
    }
}
