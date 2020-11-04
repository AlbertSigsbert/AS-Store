<ul>
<li><a href="{{route('register')}}">Sign Up</a></li>
<li><a href="{{route('login')}}">Login</a></li>
<li>
    <a href="{{route('cart.index')}}">
       Cart
           @if (Cart::instance('default')->count() > 0)
               <span class="cart-count">
                   <span>{{Cart::instance('default')->count()}}</span>
               </span>
           @endif

   </a>
</li>
</ul>
