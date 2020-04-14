<?php


namespace App\Actions\Common\Role;


class GetUserRolePresenter
{
    public static function present($role): array
    {
        if($role == 'admin'){
            return [
                'is_admin' => true
            ];
        } else {
            return [
                'is_admin' => false
            ];
        }

    }
}
