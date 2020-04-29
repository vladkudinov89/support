@component('mail::message')
    # Introduction

    Dear Admin.
    User {{ $user_name }} - {{ $user_id  }} is close support.

    @component('mail::button', ['url' => config('app.url') . '/cabinet/admin/support/' . $user_id . '/' . $support_id]
)
        View Close Support
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
