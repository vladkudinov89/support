@component('mail::message')
    # Introduction

    Dear  {{ $user_name  }}.
    You have new review in "{{ $support_title  }}" support.
    Check your support,please.

    @if($is_admin)
        @component('mail::button', ['url' => config('app.url') . '/cabinet/admin/support/' . $user_id . '/' . $support_id]
)
            View New Review
        @endcomponent
    @else
        @component('mail::button', ['url' => config('app.url') . '/cabinet/client/support/' . $user_id . '/' . $support_id]
    )
            View New Review
        @endcomponent
    @endif

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
