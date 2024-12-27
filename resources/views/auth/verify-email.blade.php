@section('content')
    <div class="max-w-464-px mx-auto w-100">
        <div>
            <h4 class="mb-12">Verify Email</h4>
            <p class="mb-32 text-secondary-light text-lg">
                Thanks for signing up! Before getting started, could you verify your email address by clicking on the link
                we just emailed to you? If you didn't receive the email, we will gladly send you another.
            </p>
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                A new verification link has been sent to the email address you provided during registration.
            </div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}" class="mb-32">
            @csrf

            <button type="submit" class="btn btn-primary text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32">
                Resend Verification Email
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="btn btn-primary text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32">
                Logout
            </button>
        </form>
    </div>
@endsection
