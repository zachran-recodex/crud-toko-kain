@extends('layouts.auth')

@section('content')
    <div class="max-w-464-px mx-auto w-100">
        <div>
            <h4 class="mb-12">Confirm Password</h4>
            <p class="mb-32 text-secondary-light text-lg">
                This is a secure area of the application. Please confirm your password before continuing.
            </p>
        </div>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="position-relative mb-20">
                <div class="icon-field">
                    <span class="icon top-50 translate-middle-y">
                        <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                    </span>
                    <input id="password" name="password" type="password"
                        class="form-control h-56-px bg-neutral-50 radius-12" required autocomplete="current-password"
                        placeholder="Current Password">
                </div>
            </div>
            <button type="submit" class="btn btn-primary text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32">
                Confirm
            </button>
        </form>
    </div>
@endsection
