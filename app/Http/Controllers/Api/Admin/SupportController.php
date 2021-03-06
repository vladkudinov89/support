<?php

namespace App\Http\Controllers\Api\Admin;

use App\Actions\Common\Support\DeleteSupport\DeleteSupportAction;
use App\Actions\Common\Support\DeleteSupport\DeleteSupportRequest;
use App\Actions\Common\Support\UpdateSupport\UpdateSupportAction;
use App\Actions\Common\Support\UpdateSupport\UpdateSupportRequest;
use App\Actions\Search\Support\SearchSupportAction;
use App\Actions\Search\Support\SearchSupportRequest;
use App\Actions\Support\Admin\GetAllSupports\GetAllSupportsAction;
use App\Actions\Support\Admin\GetAllSupports\GetAllSupportsPresenter;
use App\Actions\Support\Admin\ViewSupport\ViewSupportAction;
use App\Actions\Support\Admin\ViewSupport\ViewSupportRequest;
use App\Entities\Support;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Support\Common\ValidateSupportRequest;
use Illuminate\Http\Request;

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
     * @var ViewSupportAction
     */
    private $viewSupportAction;
    /**
     * @var SearchSupportAction
     */
    private $searchSupportAction;

    /**
     * SupportController constructor.
     */
    public function __construct(
        GetAllSupportsAction $getAllSupportsAction,
        UpdateSupportAction $updateSupportAction,
        DeleteSupportAction $deleteSupportAction,
        ViewSupportAction $viewSupportAction,
        SearchSupportAction $searchSupportAction
    )
    {
        $this->getAllSupportsAction = $getAllSupportsAction;
        $this->updateSupportAction = $updateSupportAction;
        $this->deleteSupportAction = $deleteSupportAction;
        $this->viewSupportAction = $viewSupportAction;
        $this->searchSupportAction = $searchSupportAction;
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

    public function viewSupport(Support $support)
    {
        return $this->successResponse( $this->viewSupportAction->execute(
            new ViewSupportRequest($support->id))->toArray()
        , 201);
    }

    public function search(Request $request)
    {
       return $this->successResponse(
           $this->searchSupportAction->execute(new SearchSupportRequest($request->q))->toArray()
           , 201);
    }
}
