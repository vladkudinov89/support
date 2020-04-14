<?php

namespace App\Http\Controllers\Api\Client;

use App\Actions\Support\Client\GetAllSupports\GetAllSupportsPresenter;
use App\Actions\Support\GetAllSupports\Client\GetAllSupportsAction;
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

    public function allSupports(int $id)
    {
        $allSupports = [];

        foreach ($this->getAllSupportsAction->execute($id)->getSupportCollection() as $support) {
            $allSupports[] = GetAllSupportsPresenter::present($support);
        }

        return $this->successResponse($allSupports , 201);
    }
}
