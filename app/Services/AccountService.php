<?php

namespace App\Services;

use App\Models\Account;

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
}
