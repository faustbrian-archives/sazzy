@component('mail::message')
# Hi!

{{ $invitation->team->owner->name }} has invited you to join their team!

@component('mail::button', ['url' => route('login')])
Login
@endcomponent

Since you already have an account, you may accept the invitation from your account settings screen.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
