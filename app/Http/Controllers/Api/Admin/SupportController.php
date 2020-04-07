<?php

namespace App\Http\Controllers\Api\Admin;

use App\Actions\Support\GetAllSupports\Admin\GetAllSupportsAction;
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
        return $this->successResponse($this->getAllSupportsAction->execute()->toArray());
    }
}
