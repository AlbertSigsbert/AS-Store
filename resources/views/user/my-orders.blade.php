@extends('partials.pagetemplate')

@section('title' , 'My Orders')

@section('page-content')

<div class="lining">
    <div class="lining-items container">
        <div class="lining-links">
            <a href="/"><h6>Home</h6></a>
             <i class="fa fa-chevron-right"></i>
             <a href="#"><h6>My Orders</h6></a>
        </div>
    </div>
</div>


<div class="container panels my-orders">
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
                <h1>My Orders</h1>
                <hr class="line">
            </div>
        </div>

        <div>
        @foreach ($orders as $order)
        <div class="order-container">
            <div class="order-header">
                <div class="order-header-items">
                    <div>
                        <div class="uppercase font-bold">Order Placed</div>
                        <div>{{ $order->created_at->format('M d Y') }}</div>
                    </div>
                    <div>
                        <div class="uppercase font-bold">Order ID</div>
                        <div>{{ $order->id }}</div>
                    </div><div>
                        <div class="uppercase font-bold">Total</div>
                        <div>${{ $order->billing_total }}</div>
                    </div>
                </div>
                <div>
                    <div class="order-header-items">
                        <div><a href="{{ route('orders.show', $order->id) }}">Order Details</a></div>
                        <div>|</div>
                        <div><a href="#">Invoice</a></div>
                    </div>
                </div>
            </div>
            <div class="order-products">
                @foreach ($order->products as $product)
                    <div class="order-product-item">
                        <div><img src="{{ productImage($product->image) }}" alt="Product Image"></div>
                        <div>
                            <div>
                                <a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                            </div>
                            <div>${{ $product->price }}</div>
                            <div>Quantity: {{ $product->pivot->quantity }}</div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div> <!-- end order-container -->
        @endforeach
        </div>
    </div>


       <div class="padding-medium"></div>
    </div>
</div>
@endsection


