@component('mail::message')
# Introduction

Dear Admin.
You have new support from {{ $user_name  }}

<h2>{{$support_title}}</h2>
<p>{{$support_message}}</p>

    @component('mail::button', ['url' => config('app.url') . '/cabinet/admin/support/' . $user_id . '/' . $support_id]
)
View New Support
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
