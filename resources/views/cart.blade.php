@extends('partials.pagetemplate')

@section('page-content')
<div class="lining ">
    <div class="container  flex">
         <a href="/"><h6>Home</h6></a>
         <i class="fa fa-chevron-right"></i>
         <a href="#"> <h6>Shopping Cart</h6></a>
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

       <!-- <div class="cart-item-code">
            <p>Have A Code ?</p>
            <div class="apply-coupon">
               <input type="text">
               <button class="btn-primary">Apply</button>
            </div>
        </div>  -->

        <div class="total-pricing">
            <div class="shipping">
                <p>Shipping is free because we are awesome like that.
                    Welcome Again!!!
               </p>
            </div>
            <div class="price-calc">
                <div class="left-pricing">
                    <p>Subtotal </p>
                    <p>Tax (18%) </p>
                    <p>Total </p>
                </div>
                <div class="right-pricing">
                   <p> ${{Cart::subtotal()}}</p>
                   <p>${{Cart::tax()}}</p>
                    <p>${{Cart::total()}}</p>
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
@endsection
