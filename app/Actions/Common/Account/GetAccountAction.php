<?php


namespace App\Actions\Common\Account;


use App\Repositories\Common\Account\AccountRepositoryInterface;

class GetAccountAction
{
    /**
     * @var AccountRepositoryInterface
     */
    private $accountRepository;

    /**
     * GetAccountAction constructor.
     */
    public function __construct(AccountRepositoryInterface $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    public function execute(): GetAccountResponse
    {
        $user = $this->accountRepository->account();
        return new GetAccountResponse($user);
    }
}
