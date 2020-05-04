<?php


namespace App\Actions\Common\Support\GetSingleSupport;


class GetSingleSupportPresenter
{
    public static function present(array $support): array
    {
        return [
            'id' => $support['id'],
            'support_title' => $support['title'],
            'support_message' => $support['message'],
            'support_status_active' => $support['status_activities'],
            'support_status_view' => $support['status_view'],
            'is_admin_viewed_support' => $support['admin_id_accept_exec']
        ];
    }
}
