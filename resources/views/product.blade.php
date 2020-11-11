@extends('partials.pagetemplate')

@section('title' , 'Product')

@section('page-content')

<div class="lining">
    <div class="lining-items container">
        <div class="lining-links">
            <a href="/"><h6>Home</h6></a>
            <i class="fa fa-chevron-right"></i>
            <a href="{{route('shop.index')}}"><h6>Shop</h6></a>
            <i class="fa fa-chevron-right"></i>
            <a href="#"> <h6>{{$product->name}}</h6></a>
       </div>
       <div>
           @include('partials.search')
       </div>
    </div>
</div>

 <div class="container">
    @include('partials.messages')
 </div>

<div class="product-section container padding-large">

    <div>
        <div class="product-section-image">
            {{-- <img src="{{asset('images/Products/'.$product->slug.'.jpg')}}" alt="">  ---}}
            <img src="{{ productImage($product->image) }}" alt="product" id="currentImage" class="active">
        </div>
        <div class="product-section-images">
            <div class="product-section-thumbnail selected">
                <img src="{{ productImage($product->image) }}" alt="product">
            </div>

           @if ($product->images)
               @foreach (json_decode($product->images , true) as $image)
                    <div class="product-section-thumbnail selected">
                        <img src="{{ productImage($image) }}" alt="product">
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="product-section-info">
        <h3>{{$product->name}}</h3>
        <h5>{{$product->details}}</h5>
        <h4>${{$product->price}}</h4>

        <p>{!! $product->description !!}</p>


        <form action="{{ route('cart.store')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$product->id}}">
            <input type="hidden" name="name" value="{{$product->name}}">
            <input type="hidden" name="price" value="{{$product->price}}">
            <button type="submit" class="btn-primary btn-margin" >Add to Cart</button>
        </form>

    </div>
</div>

    @include('partials.mightlike')

@endsection

@section('scripts')
  <script>
      (function(){

         const currentImage = document.querySelector('#currentImage');
         const images = document.querySelectorAll('.product-section-thumbnail');

         images.forEach((element) => element.addEventListener('click',thumbnailClick));

         function thumbnailClick(e){

             currentImage.classList.remove('active');

             currentImage.addEventListener('transitionend', () => {
                currentImage.src = this.querySelector('img').src;
                currentImage.classList.add('active');
             })

            images.forEach((element) => element.classList.remove('selected'));


            this.classList.add('selected')
         }

      })();
  </script>
@endsection
