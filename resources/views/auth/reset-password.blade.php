@extends('layouts.auth')

@section('content')
    <div class="max-w-464-px mx-auto w-100">
        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="icon-field mb-16">
                <span class="icon top-50 translate-middle-y">
                    <iconify-icon icon="mage:email"></iconify-icon>
                </span>
                <input id="email" name="email" value="{{ old('email') }}" type="email"
                    class="form-control h-56-px bg-neutral-50 radius-12" placeholder="Email" required
                    autocomplete="username">
            </div>
            <div class="icon-field mb-16">
                <span class="icon top-50 translate-middle-y">
                    <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                </span>
                <input id="password" name="password" type="password" class="form-control h-56-px bg-neutral-50 radius-12"
                    required autocomplete="new-password" placeholder="Password">
            </div>
            <span
                class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light"
                data-toggle="#password"></span>
            <div class="icon-field mb-16">
                <span class="icon top-50 translate-middle-y">
                    <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                </span>
                <input id="password_confirmation" name="password_confirmation" type="password"
                    class="form-control h-56-px bg-neutral-50 radius-12" required autocomplete="new-password"
                    placeholder="Confirmation Password">
            </div>

            <button type="submit" class="btn btn-primary text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32">
                Reset Password
            </button>
        </form>
    </div>
@endsection
