@extends('layouts.auth')

@section('content')
    <div class="max-w-464-px mx-auto w-100">
        <div>
            <h4 class="mb-12">Forgot Password</h4>
            <p class="mb-32 text-secondary-light text-lg">Enter the email address associated with your account and we will
                send you a link to reset your password.</p>
        </div>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="icon-field">
                <span class="icon top-50 translate-middle-y">
                    <iconify-icon icon="mage:email"></iconify-icon>
                </span>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="form-control h-56-px bg-neutral-50 radius-12" placeholder="Enter Email">
            </div>
            <button type="submit" class="btn btn-primary text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32">
                Continue
            </button>

            <div class="text-center">
                <a href="{{ route('login') }}" class="text-primary-600 fw-bold mt-24">Back to Login</a>
            </div>
        </form>
    </div>
@endsection
