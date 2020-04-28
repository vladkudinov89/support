<?php


namespace App\Actions\Support\Client\AddSupport;


use App\Entities\Support;
use App\Entities\User;
use App\Mail\Support\Client\AddSupportMail;
use App\Repositories\Support\SupportRepositoryInterface;
use Illuminate\Support\Facades\Mail;

class AddSupportAction
{
    /**
     * @var SupportRepositoryInterface
     */
    private $supportRepository;

    /**
     * AddSupportAction constructor.
     */
    public function __construct(SupportRepositoryInterface $supportRepository)
    {
        $this->supportRepository = $supportRepository;
    }

    public function excecute(AddSupportRequest $supportRequest): AddSupportResponse
    {
        $addSupport = new Support([
            'title' => $supportRequest->getTitle(),
            'message' => $supportRequest->getMessage(),
            'status_activities' => 'active',
            'status_view' => 'unviewed',
            'user_id' => $supportRequest->getUserId()
        ]);

        $support = $this->supportRepository->save($addSupport);

        Mail::to(User::getAdmin()->email)
            ->send(new AddSupportMail(
                $support
            ));

        return new AddSupportResponse($support);
    }
}
