<?php

namespace App\Http\Controllers\Api\Client;

use App\Actions\Support\GetAllSupports\Client\GetAllSupportsAction;
use App\Http\Controllers\Controller;

class SupportController extends Controller
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
        $this->getAllSupportsAction->execute()->getSupportCollection();
    }
}
