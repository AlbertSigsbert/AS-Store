<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel Ecommerce</title>

        <!--fonts-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500&family=Roboto&display=swap" rel="stylesheet"
        <!--styles-->
      <link rel="stylesheet" href="{{asset('css/app.css')}}">
      <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    </head>

<body>
       <header>
           <div class="top-nav container">
               <div class="logo">Laravel Ecommerce</div>
               <ul>
                   <li><a href="{{route('shop.index')}}">Shop</a></li>
                   <li><a href="#">About</a></li>
                   <li><a href="#">Blog</a></li>
                   <li>
                    <a href="{{route('cart.index')}}">
                       Cart
                           @if (Cart::instance('default')->count() > 0)
                               <span class="cart-count">
                                   <span>{{Cart::instance('default')->count()}}</span>
                               </span>
                           @endif

                   </a>
               </li>
               </ul>

           </div><!--End of top nav -->

           <div class="hero container">
               <div class="hero-content">
                   <h1>Laravel Ecommerce</h1>
                   <p>Includes multiple products,categories,a shopping cart and a checkout system with Stripe Integration.
                    </p>
                    <div class="hero-buttons container">
                        <a href="#" class="button button-white">Button 1</a>
                        <a href="#" class="button button-white">Button 2</a>
                    </div>
               </div><!-- End of hero content -->

               <div class="hero-image">
                   <img src="images/laptop4.png" alt="hero-image">
               </div>
           </div><!--End Hero-->
       </header>

       <section>
            <div class="featured-section">
                <div class="container">
                    <h1 class="text-center">Laravel Ecommerce</h1>

                    <p class="section-description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Officia porro animi quasi facilis iure deleniti, omnis f
                        ugit quod facere illum nihil vero quae numquam sapiente lau
                        dantium qui ipsum! Velit, molestiae?
                    </p>

                    <div class="text-center button-container">
                        <a href="" class="button">Featured</a>
                        <a href="" class="button">On Sale</a>
                    </div>

                <div class="products text-center">
                     @foreach ($products as $product)
                        <div class="product">
                            <a href="{{route('shop.show' , $product->slug)}}">
                                <img src="{{ productImage($product->image) }}" alt="">
                            </a>
                            <a href="{{route('shop.show' , $product->slug)}}">
                                <span class="product-name">{{$product->name}}</span>
                            </a>
                            <div class="product-price">${{$product->price}}</div>
                        </div>
                     @endforeach
                </div><!--end of products-->

                    <div class="text-center button-container">
                      <a href="{{route('shop.index')}}" class="button">View More Products</a>
                    </div>

                </div><!--end of container-->
            </div>
       </section>

       <section>
           <div class="blog-section">
               <div class="container">
                   <h1 class="text-center">From our Blog</h1>

                   <p class="section-description">
                       Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                       Maxime tempora unde eius facilis accusamus vel incidunt la
                       udantium suscipit optio sit, cum nemo rem magnam numquam
                       modi corrupti! Recusandae, quasi ullam!
                    </p>

                    <div class="blog-posts">
                        <div class="blog-post"id="blog1">
                            <a href=""><img src="images/blog1.jpg" alt="blog-post-image"></a>
                            <a href=""><h2 class="blog-title">Blog post Title 1</h2></a>
                            <div class="blog-description">
                                Lorem, ipsum dolor sit amet
                                consectetur adipisicing elit. Ducimus, eaque? Nisi, neque.
                            </div>
                        </div>

                        <div class="blog-post"id="blog2">
                            <a href=""><img src="images/blog2.jpg" alt="blog-post-image"></a>
                            <a href=""><h2 class="blog-title">Blog post Title 1</h2></a>
                            <div class="blog-description">
                                Lorem, ipsum dolor sit amet
                                consectetur adipisicing elit. Ducimus, eaque? Nisi, neque.
                            </div>
                        </div>

                        <div class="blog-post"id="blog3">
                            <a href=""><img src="images/blog3.jpg" alt="blog-post-image"></a>
                            <a href=""><h2 class="blog-title">Blog post Title 1</h2></a>
                            <div class="blog-description">
                                Lorem, ipsum dolor sit amet
                                consectetur adipisicing elit. Ducimus, eaque? Nisi, neque.
                            </div>
                        </div>
                    </div><!--end of blogposts-->
               </div><!--end of container-->
           </div><!--end of blog section-->
       </section>

       <footer>
        <div class="footer-content container">
            <div class="made-with">
                Made with <i class="fa fa-heart"></i> by Albert and Micah
            </div>

            <ul>
                <li>Follow Us:</li>
                <li><a href="#"><i class="fa fa-globe"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                <li><a href="#"><i class="fa fa-github"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            </ul>
        </div><!--end of footer content-->

    </footer>

    </body>
</html>
