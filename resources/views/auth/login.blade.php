@extends('layouts.auth')

@section('content')
    <div class="max-w-464-px mx-auto w-100">
        <div>
            <span class="logo-title">STOCKJM</span>
            <style>
                .logo-title {
                    font-size: 24px;
                    font-weight: bold;
                    color: #333;
                    display: block;
                    text-align: center;
                    margin: 20px 0;
                }
            </style>
        </div>
        <form method="POST" action="{{ route('login.post') }}">
            @csrf

            <div class="icon-field mb-16">
                <span class="icon top-50 translate-middle-y">
                    <iconify-icon icon="mage:email"></iconify-icon>
                </span>
                <input id="email" name="email" type="email" class="form-control h-56-px bg-neutral-50 radius-12"
                    placeholder="Email" value="{{ old('email') }}" required autofocus autocomplete="email">
            </div>
            <div class="icon-field mb-16">
                <span class="icon top-50 translate-middle-y">
                    <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                </span>
                <input id="password" name="password" type="password" class="form-control h-56-px bg-neutral-50 radius-12"
                    required autocomplete="password" placeholder="Password">
            </div>

            <button type="submit" class="btn btn-primary text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32">
                Login
            </button>

            <div class="mt-32 text-center text-sm">
                <p class="mb-0">Don’t have an account? <a href="{{ route('register') }}"
                        class="text-primary-600 fw-semibold">Register</a></p>
            </div>

        </form>
    </div>
@endsection
