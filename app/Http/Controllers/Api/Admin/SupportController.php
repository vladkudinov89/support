<?php

namespace App\Http\Controllers\Api\Admin;

use App\Actions\Support\Admin\GetAllSupports\GetAllSupportsAction;
use App\Actions\Support\Admin\GetAllSupports\GetAllSupportsPresenter;
use App\Http\Controllers\Api\ApiController;

class SupportController extends ApiController
{
    /**
     * @var GetAllSupportsAction
     */
    private $getAllSupportsAction;

    /**
     * SupportController constructor.
     */
    public function __construct(
        GetAllSupportsAction $getAllSupportsAction
    )
    {
        $this->getAllSupportsAction = $getAllSupportsAction;
    }

    public function allSupports()
    {
        $allSupports = [];

        foreach ($this->getAllSupportsAction->execute()->getSupportCollection() as $support) {
            $allSupports[] = GetAllSupportsPresenter::present($support);
        }

        return $this->successResponse($allSupports , 201);
    }
}
