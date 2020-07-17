@component('mail::message')
# Hi!

{{ $invitation->team->owner->name }} has invited you to join their team!

If you do not already have an account, you may click the following link to get started:

@component('mail::button', ['url' => route('register')])
Register
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
