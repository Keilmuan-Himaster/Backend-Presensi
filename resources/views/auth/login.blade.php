@extends('layouts.auth')

@section('title')
    Login Account Presensi
@endsection

@section('content')
    <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
        @csrf
        <span class="login100-form-title p-b-43">
            Login to continue
        </span>


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

        <div class="flex-sb-m w-full p-t-3 p-b-32">
            <div class="contact100-form-checkbox">
                <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="label-checkbox100" for="ckb1">
                    Remember me
                </label>
            </div>

            <div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="txt1">
                        Forgot Password?
                    </a>
                @endif
            </div>
        </div>


        <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
                Login
            </button>
        </div>

        <div class="text-center p-t-46 p-b-20">
            <span class="txt2">
                or you can <a href="{{route('register')}}">register</a>
            </span>
        </div>
    </form>
@endsection
