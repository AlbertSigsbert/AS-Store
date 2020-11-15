@extends('partials.pagetemplate')

@section('title' , 'Search Results Algolia')

@section('extra-css')
 <link rel="stylesheet" href="{{asset('css/app.css')}}">
 <link rel="stylesheet" href="{{asset('css/algolia.css')}}">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/instantsearch.js@2.6.0/dist/instantsearch.min.css">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/instantsearch.js@2.6.0/dist/instantsearch-theme-algolia.min.css">

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

<div class="search-results-container-algolia container">
    @include('partials.messages')

     <div>
            <h2>Search</h2>

            <div id="search-box">
                <!-- SearchBox widget will appear here -->
            </div>

            <div id="stats-container"></div>

            <h2 class="mt-2">Categories</h2>

            <div id="refinement-list">
                <!-- RefinementList widget will appear here -->
            </div>

    </div>

     <div>
            <div id="hits">
                <!-- Hits widget will appear here -->
           </div>

            <div id="pagination">
                <!-- Pagination widget will appear here -->
            </div>
     </div>


</div><!-- End of Container -->
@endsection

@section('scripts')
<!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
<script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
<script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
<script src="{{ asset('js/algolia.js') }}"></script>

<!-- Instant Search -->
<script src="https://cdn.jsdelivr.net/npm/instantsearch.js@2.6.0"></script>
<script src="{{ asset('js/algolia-instant-search.js') }}"></script>
@endsection
