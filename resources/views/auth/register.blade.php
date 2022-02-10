@extends('layouts.auth')

@section('title')
    Register Account Presensi
@endsection

@section('content')
    <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
        @csrf
        <span class="login100-form-title p-b-43">
            Register to continue
        </span>

        <div class="wrap-input100 validate-input" data-validate = "Username is required">
            <input class="input100" type="text" name="name" id="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            <span class="focus-input100"></span>
            <span class="label-input100">Username</span>
        </div>

        <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" name="email">
            <span class="focus-input100"></span>
            <span class="label-input100">Email</span>
        </div>


        <div class="wrap-input100 validate-input" data-validate="Password is required">
            <input class="input100" type="password" name="password">
            <span class="focus-input100"></span>
            <span class="label-input100">Password</span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Confirm Password is required">
            <input class="input100" type="password" name="password_confirmation" required autocomplete="new-password">
            <span class="focus-input100"></span>
            <span class="label-input100">Confirm Password</span>
        </div>

        <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
                Register
            </button>
        </div>

        <div class="text-center p-t-46 p-b-20">
            <span class="txt2">
                or you can <a href="{{route('login')}}">login</a> if you already have an account
            </span>
        </div>

    </form>
@endsection
