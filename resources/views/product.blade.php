@extends('partials.pagetemplate')

@section('page-content')
     
<div class="lining ">
    <div class="container  flex">
         <a href="/"><h6>Home</h6></a>
         <i class="fa fa-chevron-right"></i>
         <a href="{{route('shop.index')}}"><h6>Shop</h6></a>
         <i class="fa fa-chevron-right"></i>
         <a href="#"> <h6>{{$product->name}}</h6></a>
    </div> 
</div>

<div class="product-section container padding-large">
    <div class="product-section-image">
      <img src="{{asset('images/Products/'.$product->slug.'.jpg')}}" alt="">
    </div>
    <div class="product-section-info">
        <h3>{{$product->name}}</h3>
        <h5>{{$product->details}}</h5>
        <h4>${{$product->price}}</h4>

        <p>{{$product->description}}</p>

        
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