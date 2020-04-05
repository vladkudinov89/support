<?php

namespace App\Http\Controllers\Api;

use App\Actions\Support\GetAllSupports\GetAllSupportsAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    public function index()
    {
        return $this->getAllSupportsAction->execute()->getSupportCollection();
    }
}
