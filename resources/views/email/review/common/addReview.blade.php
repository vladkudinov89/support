@component('mail::message')
    # Introduction

    Dear
    @if($is_admin)
       Client
    @else
        Admin
    @endif

     .
    You have new review in "{{ $support_title  }}" support.
    Check your support,please.

    @if($is_admin)
        @component('mail::button', ['url' => config('app.url') . '/cabinet/client/' . $user_id . '/' . $support_id]
          )
            View New Review
        @endcomponent
    @else
        @component('mail::button', ['url' => config('app.url') . '/cabinet/admin/support/' . $user_id . '/' . $support_id]
)
            View New Review
        @endcomponent

    @endif

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
