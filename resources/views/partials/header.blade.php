<div class="nav">
    <div class="top-nav container padding-medium ">
        <div class="top-nav-left">
            <div class="logo header-logo">
             <a href="{{route('landing-page')}}"> Laravel Ecommerce</a>
            </div>
            @if (! (request()->is('checkout') ||  request()->is('guestCheckout')))
            <ul>
                <li><a href="{{route('shop.index')}}">Shop</a></li>
                <li><a href="#">About</a></li>
                <li><a href="{{ route('blog.index')}}">Blog</a></li>
            </ul>
            @endif
       </div>
       <div class="top-nav-right">
        @if (! ( request()->is('checkout') ||  request()->is('guestCheckout')))
            @include('partials.main-menu-right')
        @endif
       </div>

    </div>
   </div><!--End of Top nav -->


