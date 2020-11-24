@extends('partials.pagetemplate')

@section('title' , 'My Profile')

@section('page-content')

<div class="lining">
    <div class="lining-items container">
        <div class="lining-links">
            <a href="/"><h6>Home</h6></a>
             <i class="fa fa-chevron-right"></i>
             <a href="#"><h6>My Profile</h6></a>
        </div>
    </div>
</div>


<div class="container panels">
    <div class="left-panel">
       <ul>
            <li class="active"><a href="{{ route('users.edit')}}">My Profile</a></li>
            <li><a href="{{ route('orders.index')}}">My Orders</a></li>
       </ul>
    </div>

    <div class="right-panel padding-medium">
        @include('partials.messages')

        <div class="my-profile">
            <div class="products-header  padding-medium">
                <div class="featured">
                    <hr class="line">
                      <h1>My Profile</h1>
                    <hr class="line">
                </div>
            </div>


                <div>
                    <form action="{{ route('users.update') }}" method="POST">
                        @method('patch')
                        @csrf
                        <div class="form-control">
                            <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="Name" required>
                        </div>
                        <div  class="form-control">
                            <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Email" required>
                        </div>
                        <div  class="form-control">
                            <input id="password" type="password" name="password" placeholder="Password">
                            <div>Leave password blank to keep current password</div>
                        </div>
                        <div  class="form-control">
                            <input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password">
                        </div>
                        <div>
                            <button type="submit" class="my-profile-button">Update Profile</button>
                        </div>
                    </form>
                </div>


           </div>

        <div class="padding-medium"></div>

    </div>
</div>
@endsection




