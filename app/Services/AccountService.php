<?php

namespace App\Services;

use App\Models\Account;
use Carbon\Carbon;

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
}
