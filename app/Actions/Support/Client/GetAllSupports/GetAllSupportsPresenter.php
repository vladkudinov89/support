<?php

namespace App\Actions\Support\Client\GetAllSupports;

use App\Entities\Support;

class GetAllSupportsPresenter
{
    public static function present(Support $support): array
    {
        return [
            'id' => $support->id,
            'support_title' => $support->title,
            'support_message' => $support->message,
            'support_status_active' => $support->status_activities,
            'support_status_view' => $support->status_view
        ];
    }
}
