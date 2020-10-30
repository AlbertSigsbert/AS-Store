<section class="might-like padding-medium">
    <div class="container">
        <h4 class="padding-medium">You might also like...</h4>
        <div class="products text-center">
             @foreach ($mightLike as $product)
             <div class="might-like-product">
                 <a href="{{route('shop.show' , $product->slug)}}">
                    <img src="{{asset('images/Products/'.$product->slug.'.jpg')}}" alt=""> 
                    <span class="product-name">{{$product->name}}</span>
                    <div class="product-price">${{$product->price}}</div>
                 </a>
              </div>
             @endforeach
        </div>
    </div>
</section>