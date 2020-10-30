<div class="nav">
    <div class="top-nav container padding-medium ">
        <div class="logo header-logo">
          <a href="{{route('landing-page')}}">Laravel Ecommerce</a>
        </div>
           
        @if (! request()->is('checkout'))
        <ul>
            <li><a href="{{route('shop.index')}}">Shop</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Blog</a></li>
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
        @endif
    </div>
   </div><!--End of Top nav -->


   