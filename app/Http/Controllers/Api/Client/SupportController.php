<?php

namespace App\Http\Controllers\Api\Client;

use App\Actions\Common\Support\DeleteSupport\DeleteSupportAction;
use App\Actions\Common\Support\DeleteSupport\DeleteSupportRequest;
use App\Actions\Common\Support\GetSingleSupport\GetSingleSupportAction;
use App\Actions\Common\Support\GetSingleSupport\GetSingleSupportPresenter;
use App\Actions\Common\Support\GetSingleSupport\GetSingleSupportRequest;
use App\Actions\Support\Client\AddSupport\AddSupportAction;
use App\Actions\Support\Client\AddSupport\AddSupportRequest;
use App\Actions\Support\Client\GetAllSupports\GetAllSupportsPresenter;
use App\Actions\Common\Support\UpdateSupport\UpdateSupportAction;
use App\Actions\Common\Support\UpdateSupport\UpdateSupportRequest;
use App\Actions\Support\GetAllSupports\Client\GetAllSupportsAction;
use App\Entities\Support;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Support\Common\ValidateAddSupportRequest;
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
     * @var GetSingleSupportAction
     */
    private $getSingleSupportAction;
    /**
     * @var DeleteSupportAction
     */
    private $deleteSupportAction;
    /**
     * @var AddSupportAction
     */
    private $addSupportAction;

    /**
     * SupportController constructor.
     */
    public function __construct(
        GetAllSupportsAction $getAllSupportsAction,
        GetSingleSupportAction $getSingleSupportAction,
        UpdateSupportAction $updateSupportAction,
        DeleteSupportAction $deleteSupportAction,
        AddSupportAction $addSupportAction
    )
    {
        $this->getAllSupportsAction = $getAllSupportsAction;
        $this->updateSupportAction = $updateSupportAction;
        $this->getSingleSupportAction = $getSingleSupportAction;
        $this->deleteSupportAction = $deleteSupportAction;
        $this->addSupportAction = $addSupportAction;
    }

    public function allSupports(int $id, Support $support)
    {
        $this->authorize('viewById', $id);

        $allSupports = [];

        foreach ($this->getAllSupportsAction->execute($id)->getSupportCollection() as $support) {
            $allSupports[] = GetAllSupportsPresenter::present($support);
        }

        return $this->successResponse($allSupports, 201);
    }

    public function getSingleSupport(int $user_id, int $support_id)
    {
        $support = $this->getSingleSupportAction->execute(new GetSingleSupportRequest($support_id));

        return $this->successResponse(GetSingleSupportPresenter::present($support->toArray()), 201);
    }

    public function addSupport(ValidateAddSupportRequest $supportRequest)
    {
       $addSupport = $this->addSupportAction->excecute(new AddSupportRequest(
           $supportRequest->title,
           $supportRequest->message,
           $supportRequest->user_id
       ));

       return $this->successResponse( GetSingleSupportPresenter::present($addSupport->toArray()), 201);
    }

    public function updateSupport(ValidateSupportRequest $supportRequest, Support $support)
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

    public function destroySupport(int $id)
    {
        $this->deleteSupportAction->execute(new DeleteSupportRequest($id));

        return $this->successResponse([], 201);
    }
}
