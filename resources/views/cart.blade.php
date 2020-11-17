@extends('partials.pagetemplate')

@section('title' , 'Cart')

@section('extra-css')
 <link rel="stylesheet" href="{{asset('css/algolia.css')}}">
@endsection

@section('page-content')
<div class="lining">
    <div class="lining-items container">
        <div class="lining-links">
            <a href="/"><h6>Home</h6></a>
            <i class="fa fa-chevron-right"></i>
            <a href="#"> <h6>Shopping Cart</h6></a>
       </div>
       <div>
           @include('partials.search')
       </div>
    </div>
</div>

 <div class="container ">
     <div class="wrapper">
         @include('partials.messages')

         @if (Cart::count() > 0)

        <h2>{{Cart::count()}} item(s) in Shopping Cart</h2>

        @foreach (Cart::content() as $item)

        <hr>
        <div class="cart-item">
               <div class="cart-image">
                    <a href="{{route('shop.show' , $item->model->slug) }}">
                        <img src="{{ productImage($item->model->image) }}" alt="">
                    </a>
               </div>

               <div class="cart-details">
                   <a href="{{route('shop.show' , $item->model->slug)}}">
                      <h5>{{$item->model->name}}</h5>
                   </a>
                   <p>{{$item->model->details}}</p>
               </div>

               <div class="cart-options">
                   {{--<a href="">Remove</a> --}}
                   <form action="{{route('cart.destroy', $item->rowId)}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="borderless">Remove</button>
                   </form>
                   <br>
                   {{--<a href=""><span>Save for later</span> </a>--}}
                   <form action="{{route('cart.saveForLater', $item->rowId)}}" method="POST">
                    @csrf
                    <button type="submit" class="borderless"><span>Save for later</span></button>
                 </form>

               </div>

               <div class=" cart-items-quantity">
                 <select name="" id="" class="quantity" data-id="{{$item->rowId}}">
                       @for ($i = 1; $i < 5 + 1; $i++)
                         <option {{ $item->qty == $i ? 'selected': '' }}>{{$i}}</option>
                       @endfor
                  </select>
               </div>

               <div class="cart-items-price">
                   ${{$item->subtotal}}
               </div>
        </div>
        <hr>

    @endforeach

            @if (! session()->has('coupon'))
            <div class="cart-item-code">
                <p> <strong> Have A Code ?</strong></p>
                <div class="apply-coupon">
                    <form action="{{route('coupon.store')}}" method="POST">
                        @csrf
                        <input type="text" name="coupon_code" id="coupon_code">
                        <button type="submit" class="btn-primary">Apply</button>
                    </form>
                </div>
            </div>
        @endif


        <div class="total-pricing">
            <div class="shipping">
                <p>Shipping is free because we are awesome like that.
                    Welcome Again!!!
               </p>
            </div>
            <div class="price-calc">
                <div class="left-pricing">
                    <p>Subtotal </p>
                    @if (session()->has('coupon'))
                        Discount ({{ session()->get('coupon') ['name'] }}):
                        <form action="{{ route('coupon.destroy')}}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-transparent">Remove Coupon</button>
                        </form>
                        <hr class="margin-sm">
                        <p>New Subtotal</p>
                    @endif
                    <p>Tax (18%) </p>
                    <p>Total </p>
                </div>
                <div class="right-pricing">
                   <p> ${{Cart::subtotal()}}</p>
                   @if (session()->has('coupon'))
                   <p>-${{ $discount }}</p>
                       <br><br><hr style="margin-bottom: 1em; margin-top:3.9px;">
                   <p>${{ $newSubtotal }}</p>
                @endif
                   <p>${{ $newTax }}</p>
                    <p>${{ $newTotal }}</p>
                </div>
            </div>
        </div>

        <div class="cart-buttons ">
            <a class="btn-transparent" href="{{route('shop.index')}}">Continue Shopping</a>
            <a class="btn-green text-white" href="{{route('checkout.index')}}">Proceed To Checkout</a>
        </div>

        @else
             <h2>No items in Cart!</h2>
             <a href="{{route('shop.index')}}" class="btn-transparent">Continue Shopping</a>

        @endif

    <div class="saved-for-later">
        @if (Cart::instance('saveForLater')->count() > 0)

            <h2>{{Cart::instance('saveForLater')->count()}} item(s) Saved For Later</h2>


        @foreach (Cart::instance('saveForLater')->content() as $item)

        <hr>
        <div class="cart-item">
               <div class="cart-image">
                    <a href="{{route('shop.show' , $item->model->slug) }}">
                        <img src="{{ asset('images/Products/'.$item->model->slug.'.jpg')}}" alt="">
                    </a>
               </div>

               <div class="cart-details">
                   <a href="{{route('shop.show' , $item->model->slug)}}">
                      <h5>{{$item->model->name}}</h5>
                   </a>
                   <p>{{$item->model->details}}</p>
               </div>

               <div class="cart-options">

                   <form action="{{route('saveForLater.destroy', $item->rowId)}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="borderless">Remove</button>
                   </form>
                   <br>

                   <form action="{{route('saveForLater.moveToCart', $item->rowId)}}" method="POST">
                    @csrf
                    <button type="submit" class="borderless"><span>Move to Cart</span></button>
                 </form>

               </div>

               <div class=" cart-items-quantity">
                  <select name="" id="">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                  </select>
               </div>

               <div class="cart-items-price">
                   ${{$item->model->price}}
               </div>
        </div>
        <hr>

    @endforeach

            @else
                <p>You have no items Saved For Later</p>
            @endif

        </div>

     </div>
 </div>
 @include('partials.mightlike')
@endsection

@section('scripts')
    <script>
      (function(){

        const classname = document.querySelectorAll('.quantity')

        Array.from(classname).forEach(function(element){

            element.addEventListener('change' , function(){

                    const id = element.getAttribute('data-id')

                    axios.patch(`/cart/${id}`, {
                        quantity: this.value
                })
                .then(function (response) {
                    //console.log(response);
                    window.location.href = '{{ route( 'cart.index') }}'
                })
                .catch(function (error) {
                    console.log(error);
                });
             })
        })

      })();
    </script>

<!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
<script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
<script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
<script src="{{ asset('js/algolia.js') }}"></script>
@endsection
