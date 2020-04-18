<?php

namespace App\Http\Controllers\Api\Client;

use App\Actions\Support\Client\GetAllSupports\GetAllSupportsPresenter;
use App\Actions\Common\Support\UpdateSupport\UpdateSupportAction;
use App\Actions\Common\Support\UpdateSupport\UpdateSupportRequest;
use App\Actions\Support\GetAllSupports\Client\GetAllSupportsAction;
use App\Entities\Support;
use App\Entities\User;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Support\Common\ValidateUpdateSupportRequest;
use Illuminate\Support\Facades\Auth;

class SupportController extends ApiController
{
    /**
     * @var GetAllSupportsAction
     */
    private $getAllSupportsAction;
    /**
     * @var UpdateSupportAction
     */
    private $updateSupportAction;

    /**
     * SupportController constructor.
     */
    public function __construct(
        GetAllSupportsAction $getAllSupportsAction,
        UpdateSupportAction $updateSupportAction
    )
    {
        $this->getAllSupportsAction = $getAllSupportsAction;
        $this->updateSupportAction = $updateSupportAction;
    }

    public function allSupports(int $id , Support $support)
    {
        $this->authorize('viewById', $id);

        $allSupports = [];

        foreach ($this->getAllSupportsAction->execute($id)->getSupportCollection() as $support) {
            $allSupports[] = GetAllSupportsPresenter::present($support);
        }

        return $this->successResponse($allSupports, 201);
    }

    public function updateSupport(ValidateUpdateSupportRequest $supportRequest, Support $support)
    {
        $this->authorize('update', $support);

        $updateResponse = $this->updateSupportAction->execute(
            new UpdateSupportRequest(
                $support->id,
                $supportRequest->title,
                $supportRequest->message,
                $supportRequest->status_activities,
                $supportRequest->status_view
            )
        );
        return $this->successResponse($updateResponse->toArray(), 201);
    }
}
