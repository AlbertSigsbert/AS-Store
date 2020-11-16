@extends('partials.pagetemplate')

@section('page-content')
<div class="container">
    <div class="auth-pages">
        <div class="auth-left">
            @include('partials.messages')

           <h2>Returning Customer</h2>
           <div class="padding-medium"></div>

           <form action="{{route('login')}}" method="POST">
               @csrf

                <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email')}}" required autofocus>

                <input type="password" name="password" id="password" placeholder="Password" value="{{ old('password')}}" required autofocus>

                <div class="login-container">
                    <button type="submit" class="auth-button">Login</button>

                    <label for="remember">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        Remember Me
                    </label>
                </div>

                <div class="padding-medium"></div>
                <a href="{{ route('password.request') }}"> Forgot Your Password? </a>

           </form>
        </div>

        <div class="auth-right">
           <h2>New Customer</h2>
           <div class="padding-medium"></div>
           <p><strong>Save time now.</strong></p>
           <p>You don't need an account to checkout.</p>
            <div class="padding-medium"></div>
            <a href="{{ route('guestCheckout.index')}}" class="auth-button-hollow">Continue as Guest</a>
            <div class="padding-medium"></div>

               &nbsp;

            <div class="padding-medium"></div>
            <p><strong>Save time later.</strong></p>
            <p>Create an account for fast checkout and easy access to order history.</p>
             <div class="padding-medium"></div>
             <a href="{{ route('register')}}" class="auth-button-hollow">Create Account</a>
        </div>
    </div>


</div>
@endsection
