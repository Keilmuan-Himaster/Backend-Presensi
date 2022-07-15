@extends('layouts.auth')

@section('title')
    Login Account Presensi
@endsection

@section('content')
    <div class="login100-form validate-form">
        <span class="login100-form-title p-b-43">
            Verifikasi Email Anda
        </span>
        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('Verifikasi telah terkirim') }}
            </div>
        @endif
        {{ __('Sebelum mulai, cek kembali email anda termasuk folder spam') }}
        {{ __('Jika kamu tidak menerima email') }},
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit"
                class="btn btn-link p-0 m-0 align-baseline">{{ __('klik link ini aja') }}</button>.
        </form>
    </div>
@endsection
