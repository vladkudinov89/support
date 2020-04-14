<?php


namespace App\Actions\Common\Role;


use Illuminate\Database\Eloquent\Collection;

class GetUserRoleResponse
{
    /**
     * @var string
     */
    private $role;

    /**
     * GetUserRoleResponse constructor.
     */
    public function __construct(string $role)
    {
        $this->role = $role;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }
}
