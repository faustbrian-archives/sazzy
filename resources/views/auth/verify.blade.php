<x-layouts.auth header="Verify Your Email Address">
    @if (session('resent'))
        <div class="alert-success">
            A fresh verification link has been sent to your email address.
        </div>
    @endif

    <p class="text-sm leading-5 text-center text-gray-600">
        Before proceeding, please check your email for a verification link. If you did not receive the email, <a href="{{ route('verification.resend') }}" class="font-bold text-blue-500">click here to request another</a>.
    </p>
</x-layouts.auth>
