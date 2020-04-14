<?php

namespace App\Http\Controllers\Api\Common;

use App\Actions\Common\Account\GetAccountAction;
use App\Http\Controllers\Api\ApiController;

class AccountController extends ApiController
{
    /**
     * @var GetAccountAction
     */
    private $accountAction;

    /**
     * AccountController constructor.
     */
    public function __construct(GetAccountAction $accountAction)
    {
        $this->accountAction = $accountAction;
    }

    public function index()
    {
        return $this->successResponse($this->accountAction->execute()->toArray() , '201');
    }
}
