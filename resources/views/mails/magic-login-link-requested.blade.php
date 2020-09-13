@component('mail::message')
# Hi!

You can use the below link to log in to your account.

@component('mail::button', ['url' => $url])
Login
@endcomponent

This link will expired in 10 minutes.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
