<?php


namespace App\Actions\Common\Role;


use App\Repositories\Common\Role\RoleRepositoryInterface;

class GetUserRoleAction
{
    /**
     * @var RoleRepositoryInterface
     */
    private $roleRepository;

    /**
     * GetUserRoleAction constructor.
     */
    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function execute(): GetUserRoleResponse
    {
        return new GetUserRoleResponse($this->roleRepository->get_role());
    }
}
