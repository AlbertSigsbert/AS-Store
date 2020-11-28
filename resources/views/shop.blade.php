@extends('partials.pagetemplate')

@section('title' , 'Shop')

@section('extra-css')
 <link rel="stylesheet" href="{{secure_asset('css/algolia.css')}}">
@endsection


@section('page-content')

<div class="lining">
    <div class="lining-items container">
        <div class="lining-links">
            <a href="/"><h6>Home</h6></a>
             <i class="fa fa-chevron-right"></i>
             <a href="#"><h6>Shop</h6></a>
        </div>
        <div>
            @include('partials.search')
        </div>
    </div>
</div>


<div class="container panels">
    <div class="left-panel">
       <h3 class=" padding-medium">By Category</h3>
       <ul>
           @foreach ($categories as $category)
            <li class="{{ request()->category == $category->slug ? 'active' : ''}}">
                 <a href="{{ route('shop.index' , ['category' => $category->slug])}}">{{ $category->name }}</a>
             </li>
           @endforeach
       </ul>

    </div>

    <div class="right-panel padding-medium">
        @include('partials.messages')

        <div class="products-header  padding-medium">
            <div class=" featured">
                <hr class="line">
                  <h1>{{ $categoryName }}</h1>
                <hr class="line">
            </div>

             <div>
                 <strong>Price:</strong>
                 <a href="{{ route('shop.index', ['category' => request()->category , 'sort' =>'low_high']) }}">
                    Low to High
                 </a>
                  <strong>|</strong>
                 <a href="{{ route('shop.index', ['category' => request()->category , 'sort' =>'high_low']) }}">
                     High to low
                 </a>
             </div>
        </div>

        <div class="products text-center">
             @forelse ($products as $product)
                <div class="product">
                    <a href="{{route('shop.show' , $product->slug)}}">
                    <img src="{{ productImage($product->image) }}" alt="">
                </a>
                    <a href="{{route('shop.show' , $product->slug)}}"><span class="product-name">{{$product->name}}</span></a>
                    <div class="product-price">${{$product->price}}</div>
                </div>
             @empty
                  <div>
                      <h3>No products found.</h3>
                    </div>
             @endforelse
       </div><!--end of products-->

        <div class="padding-medium"></div>
        {{--  {{ $products->links() }} --}}

        {{ $products->appends(request()->input())->links() }}
    </div>
</div>
@endsection

@section('scripts')
      <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
      <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
      <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
      <script src="{{ asset('js/algolia.js') }}"></script>
@endsection

