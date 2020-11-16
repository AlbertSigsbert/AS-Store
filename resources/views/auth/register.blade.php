@extends('partials.pagetemplate')

@section('page-content')
<div class="container">
    <div class="auth-pages">
        <div class="auth-left">
            @include('partials.messages')

           <h2>Create Account</h2>
           <div class="padding-medium"></div>

           <form action="{{route('register')}}" method="POST">
               @csrf

               <input type="text" id="name" name="name" id="name" placeholder="Name" value="{{ old('Name')}}" required autofocus>

                <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email')}}" required autofocus>

                <input type="password" name="password" id="password" placeholder="Password" value="{{ old('password')}}" required autofocus>

                <input type="password" name="password_confirmation" id="password-confirm" placeholder="Confirm Password" value="{{ old('confirm-password')}}" required autofocus>

                <div class="login-container">
                    <button type="submit" class="auth-button">Create Account</button>

                    <div class="already-have-container">
                        <p><strong>Already have an account?</strong></p>
                        <a href="{{ route('login') }}">Login</a>
                    </div>
                </div>

           </form>
        </div>

        <div class="auth-right">
            <h2>New Customer</h2>
            <div class="padding-medium"></div>
            <p><strong>Save time now.</strong></p>
            <p>Creating an account will allow you to checkout faster in the future,
                have easy access to order history and customize
                your experience to suit your preferences.
            </p>

            &nbsp;
            <div class="padding-medium"></div>
            <p><strong>Loyalty Program</strong></p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                 Veritatis quidem deserunt quasi eum est!
                 Numquam sequi ex minima sapiente, modi voluptatem
                 reiciendis dicta, natus non necessitatibus ullam
                 doloremque porro dolorum!
            </p>
        </div>
    </div>

</div>

@endsection
