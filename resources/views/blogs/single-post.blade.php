@extends('partials.pagetemplate')

@section('title' ,$post->title)

@section('extra-css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection
@section('page-content')

 <div class="blog-post-image">
     <img src="{{ productImage($post->image) }}" alt="Blog-post Image" class="img-fluid w-100 ">
 </div>


 <div class="post-info">
    <h5 class="display-2 font-weight-bolder text-white">{{ $post->title }}</h5>
    <p class="lead font-weight-bold text-white"> {{ \Illuminate\Support\Str::limit($post->excerpt ,120 ) }}</p>
    <p class="lead  text-white">Published at: {{ $post->created_at->format('d M Y')  }}</p>
 </div>

 <div class="jumbotron">
    <div class="post-description text-center container">
        <p>"{{ \Illuminate\Support\Str::limit($post->excerpt , 200 ) }} "</p>
    </div>
</div>

  <div class="container">

    <div class="post-body pt-3 container">
        {!! $post->body  !!}
    </div>

    <div id="disqus_thread" class="jumbotron"></div>
    <script>
        /**
        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */

        var disqus_config = function () {
        this.page.url = '{{ config('app.url') }}/blog/{{ $post->slug}}';  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier ='{{ $post->slug}}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };

        (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://laravel-ecommerce.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
  </div>
@endsection

@section('scripts')
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5fb93a46aed52ba2"></script>

@endsection
