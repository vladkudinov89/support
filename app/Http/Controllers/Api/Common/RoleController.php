<?php

namespace App\Http\Controllers\Api\Common;

use App\Actions\Common\Role\GetUserRoleAction;
use App\Actions\Common\Role\GetUserRolePresenter;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Auth;

class RoleController extends ApiController
{
    /**
     * @var GetUserRoleAction
     */
    private $getUserRoleAction;

    /**
     * RoleController constructor.
     */
    public function __construct(GetUserRoleAction $getUserRoleAction)
    {
        $this->getUserRoleAction = $getUserRoleAction;
    }

    public function get_role()
    {
        return $this->successResponse(
            GetUserRolePresenter::present($this->getUserRoleAction->execute()->getRole()
            ) , '201');
    }

    public function get_token()
    {
        $token = Auth::user()->createToken('accessToken')->accessToken;

        return $this->successResponse(['token' => $token] , 201);
    }
}
