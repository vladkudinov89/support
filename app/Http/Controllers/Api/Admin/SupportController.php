<?php

namespace App\Http\Controllers\Api\Admin;

use App\Actions\Common\Support\DeleteSupport\DeleteSupportAction;
use App\Actions\Common\Support\DeleteSupport\DeleteSupportRequest;
use App\Actions\Support\Admin\GetAllSupports\GetAllSupportsAction;
use App\Actions\Support\Admin\GetAllSupports\GetAllSupportsPresenter;
use App\Actions\Common\Support\UpdateSupport\UpdateSupportAction;
use App\Actions\Common\Support\UpdateSupport\UpdateSupportRequest;
use App\Entities\Support;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Support\Common\ValidateSupportRequest;

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
     * @var DeleteSupportAction
     */
    private $deleteSupportAction;

    /**
     * SupportController constructor.
     */
    public function __construct(
        GetAllSupportsAction $getAllSupportsAction,
        UpdateSupportAction $updateSupportAction,
        DeleteSupportAction $deleteSupportAction
    )
    {
        $this->getAllSupportsAction = $getAllSupportsAction;
        $this->updateSupportAction = $updateSupportAction;
        $this->deleteSupportAction = $deleteSupportAction;
    }

    public function allSupports()
    {
        $allSupports = [];

        foreach ($this->getAllSupportsAction->execute()->getSupportCollection() as $support) {
            $allSupports[] = GetAllSupportsPresenter::present($support);
        }

        return $this->successResponse($allSupports, 201);
    }

    public function updateSupport(ValidateSupportRequest $supportRequest, Support $support)
    {
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

    public function destroySupport(int $id)
    {
        $this->deleteSupportAction->execute(new DeleteSupportRequest($id));

        return $this->successResponse([], 201);
    }
}
