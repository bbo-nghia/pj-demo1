<?php

namespace App\Services;

use App\Models\Account;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class AccountService
 * @package App\Services
 */
class AccountService extends BaseService
{

    /**
     * AccountService constructor.
     * @param Account $account
     */
    public function __construct(Account $account)
    {
        $this->model = $account;
    }

    /**
     * @param mixed $accountId
     * 
     * @return Account
     */
    public function findById($accountId)
    {
        return $this->model->findOrFail($accountId);
    }

    /**
     * @param Account $account
     * @return \Laravel\Passport\PersonalAccessTokenResult
     */
    public function createAccessToken(Account $account)
    {
        return $account->createToken('Personal Access Token');
    }

    /**
     * @param mixed $accountId
     * @param mixed $data
     * 
     * @return Account
     */
    public function update($accountId, $data)
    {
        $account = $this->findById($accountId);

        DB::beginTransaction();
        try {
            if (!empty($data['name'])) {
                $account->name = $data['name'];
            }
            if (!empty($data['mobile'])) {
                $account->mobile = $data['mobile'];
            }
            if (!empty($data['birthday'])) {
                $account->birthday = $data['birthday'];
            }
            if (!empty($data['mail_flag'])) {
                $account->mail_flag = $data['mail_flag'];
            }
            $account->save();
        } catch (Exception $e) {
            DB::rollBack();

            throw new Exception(__('There was a problem updating account. ' . $e->getMessage()));
        }

        DB::commit();
        return $account;
    }
}
