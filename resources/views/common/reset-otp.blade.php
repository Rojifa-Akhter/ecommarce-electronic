@extends('layouts.user')

@section('title', 'Verify OTP for Reset')

@section('content')
@php
    $email = session('reset_email');
@endphp

<div class="container-fluid">
    <div class="row min-vh-100">
        <div class="col-md-6 d-flex align-items-center justify-content-center p-5">
            <div class="w-100 text-center" style="max-width: 400px;">
                <h2 class="fw-bold mb-3 text-white">Reset Password OTP</h2>
                <p class="mb-4 text-muted">
                    OTP sent to <strong>{{ $email }}</strong>
                </p>

                <form method="POST" action="{{ url('/auth/verify-reset-otp') }}" id="otp-form">
                    @csrf

                    <div class="d-flex justify-content-between mb-3">
                        @for ($i = 0; $i < 6; $i++)
                            <input type="text" name="code[]" maxlength="1" required
                                class="form-control text-center mx-1 otp-input"
                                style="width: 60px; height: 60px; background-color: #1a1a1a; color: white; font-size: 24px; border: none; border-radius: 8px;">
                        @endfor
                    </div>

                    <input type="hidden" name="otp" id="otp">
                    <input type="hidden" name="email" value="{{ $email }}">

                    <button type="submit" class="btn w-100 py-2"
                        style="background-color: #dcb76c; color: #000; font-weight: 600;">
                        Verify OTP
                    </button>
                </form>

                @if ($errors->any())
                    <div class="mt-3 text-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('otp-form').addEventListener('submit', function (e) {
        let codeInputs = document.querySelectorAll('.otp-input');
        let otp = '';
        codeInputs.forEach(input => {
            otp += input.value;
        });
        otp = otp.substring(0, 6);
        document.getElementById('otp').value = otp;
    });
</script>
@endsection
