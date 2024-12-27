@extends('layouts.auth')

@section('content')
    <div class="max-w-464-px mx-auto w-100">
        <div>
            <span class="logo-title">TOKO KAIN</span>
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
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="icon-field mb-16">
                <span class="icon top-50 translate-middle-y">
                    <iconify-icon icon="f7:person"></iconify-icon>
                </span>
                <input id="name" name="name" value="{{ old('name') }}" type="text"
                    class="form-control h-56-px bg-neutral-50 radius-12" placeholder="Name" required autofocus
                    autocomplete="name">
            </div>
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
            <div class="icon-field mb-16">
                <span class="icon top-50 translate-middle-y">
                    <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                </span>
                <input id="password_confirmation" name="password_confirmation" type="password"
                    class="form-control h-56-px bg-neutral-50 radius-12" required autocomplete="new-password"
                    placeholder="Confirmation Password">
            </div>

            <button type="submit" class="btn btn-primary text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32">
                Register
            </button>

            <div class="mt-32 text-center text-sm">
                <p class="mb-0">Already have an account? <a href="{{ route('login') }}"
                        class="text-primary-600 fw-semibold">Login</a></p>
            </div>

        </form>
    </div>
@endsection
