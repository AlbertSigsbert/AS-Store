@extends('partials.pagetemplate')

@section('title' , 'Search Results')

@section('extra-css')
 <link rel="stylesheet" href="{{asset('css/app.css')}}">
 <link rel="stylesheet" href="{{asset('css/algolia.css')}}">
@endsection

@section('page-content')

<div class="lining">
    <div class="lining-items container">
        <div class="lining-links">
            <a href="/" style="color: #212121; text-decoration:none;"><h6 class="mt-1">Home</h6></a>
            <i class="fa fa-chevron-right"></i>
            <a href="#" style="color: #212121; text-decoration:none;"><h6 class="mt-1">Search</h6></a>
       </div>
       <div>
           @include('partials.search')
       </div>
    </div>
</div>

<div class="search-results-container container">
    @include('partials.messages')

    <h1>Search Results</h1>


 @if (!$products->count() <= 0)

      <p class="m-3 text-uppercase font-weight-bold">{{$products->total()}} results for '{{request()->input('query')}}'</p>

     <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Details</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">
                     <a href="{{ route('shop.show',$product->slug)}}" style=" color: #3ca7f1; ">{{ $product->name }}</a>
                    </th>
                    <td>{{ $product->details }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($product->description ,80 ) }}</td>
                    <td>{{ $product->price}}</td>
                </tr>
            @endforeach
        </tbody>
      </table>

       {{--Pagination Links --}}
          <div class="padding-medium"></div>
       {{ $products->appends(request()->input())->links() }}

     @else
        <h1 class="mt-5">No results Found.</h1>
    @endif




</div><!-- End of Container -->
@endsection

@section('scripts')
<!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
<script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
<script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
<script src="{{ asset('js/algolia.js') }}"></script>
@endsection
