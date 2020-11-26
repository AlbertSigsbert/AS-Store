<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!--fonts-->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Email</title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    img{ width: 100%; }

    a{
        text-decoration: none;
        color: #3ca7f1;
    }

    ul{list-style: none;}

    .container{
        max-width: 900px;
        margin: 0 auto;
    }

    .email-header{
       background-color: rgb(104, 96, 96);
       color: #fff;
       padding: 40px 0;
    }

    .email-header h3 , .order-hero h2{
       font-family: Verdana, Geneva, Tahoma, sans-serif;
       font-size: 2em;
       text-align: center;
       text-transform: uppercase;
    }
    .order-hero{
        background-color: #ffcc99;
        padding: 2rem  0;
        text-align: center;
    }

    .order-hero h2{ margin: 1em 0; }

    .order-hero p {
       font-size: 1.5em;
       font-family: Georgia, 'Times New Roman', Times, serif;
       line-height: 1.4;
    }

    .items-ordered, .order-calculations {
        background-color: #f8f8f8;
        padding: 2em 0;
    }

    .items-ordered-header{
        text-align: center;
         font-size: 1.2em;
         padding: 20px 0;
    }

    .items-ordered-content{
        display: grid;
        grid-template-columns: repeat(2 ,1fr);
        place-items: center;
        margin-bottom: 1em;
    }

    .items-ordered-image img{ width: 250px;  }

    .items-ordered-details{ padding: 20px; }

    .items-ordered-details h3, .items-ordered-details p, .promo p{
       margin-bottom: .7em;
       font-size: 1.2rem;
    }

  .order-calculations{
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8em;
    }

    .left-pricing{
        padding-right: 1em;
        font-weight: 700;
    }

    .order-shipping-info{
        background-color: #eee;
        padding: 0 0 4em 0;
    }

    .strong-hr{
        border: none;
        height: 5px;
        background: rgb(75, 71, 71);
        margin-bottom: 1em;
    }
    .order-shipping-info-header h2 ,.promo h3{
        font-size: 1.5em;
        text-align: center;
        margin-bottom: 1em;
    }
    .order-shipping-info-details {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 2em;
    font-size: 1.6em;
    }
    .order-shipping-info-details h3{
        margin-bottom: .5em;
    }
    .promo{
        padding: 2em 1em;
        background-color: #f8f8f8;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .footer{
    background-color:  rgb(104, 96, 96);
    color: white;
    padding: 2em;
    }

    .footer-content , .footer-content ul{
        display: flex;
        justify-content: space-between;
    }
    .footer-content ul{  width: 30%;    }

    .footer-content a{  color: #fff; }

    .fa-heart{ color: red; }

    .fa-globe{  color: rgb(65, 65, 236);  }

    .fa-youtube-play{color: #e7160f; }

    .fa-twitter{ color: #00aced; }

    @media all and (max-width:900px){
        .email-header{padding: 20px 0; }

        .email-header h3 , .order-hero h2{font-size: 1.2em;}
        .order-hero p {
            font-size: 1em;
            line-height: 1.1;
             padding: 0 1.3em;
        }
        .items-ordered-content{ grid-template-columns: 1fr;}


        .order-calculations{ font-size: 1.4em;}

        .order-shipping-info-details{
            flex-direction: column;
            font-size: 1.1em;
            padding: 1em;
        }
        .order-details ,.shipping-address{
            margin-bottom: 1em;
        }

        .promo{
           flex-direction: column;
           padding: 1em 2em;
        }

        .footer-content , .footer-content ul { flex-direction: column;
            align-items: center;
         }
         .footer-content ul >li {padding-bottom: .5em;}

    }
</style>
<body>
    <div class="container">
        <header>
            <div class="email-header">
               <h3>Laravel Ecommerce </h3>
            </div>
        </header>

        <section class="order-hero">
             <h2>Your order is confirmed</h2>
             <p>Hi,<em>{{ $order->billing_name}} </em>we've received your order<strong> ID {{$order->id}}</strong>
                and we are working on it now
            </p>
            <p>We'll email you an update when we've shipped it.</p>
        </section>

        <section class="items-ordered">
              <div class="items-ordered-header">
                  <h2>Items Ordered</h2>
              </div>

                @foreach ($order->products as $product)
                <div class="items-ordered-content">
                    <div class="items-ordered-image">
                        <img src="{{  productImage($product->image)}}" alt="Order-Image">
                    </div>
                    <div class="items-ordered-details">
                       <h3>{{$product->name}}</h3>
                       <p>{{ $product->details}}</p>
                       <p>Item Price: ${{$product->price}}</p>
                    </div>
                </div>
             @endforeach

        </section>
            <hr>
        <section class="order-calculations">
            <div class="left-pricing">
                <p>Subtotal: </p>
                <p>Tax(18%): </p><br>
                <p>Order Total: </p>
            </div>
            <div class="right-pricing">
               <p> ${{$order->billing_subtotal}}</p>
               <p>${{$order->billing_tax}}</p><br>
                <p>${{$order->billing_total}}</p>
            </div>
        </section>

        <section class="order-shipping-info">
            <div class="order-shipping-info-header">
                  <hr class="strong-hr">
                   <h2>Order & Shipping Information</h2>
                <hr class="strong-hr">
            </div>

            <div class="order-shipping-info-details">
                 <div class="order-details">
                    <h3>Order Details</h3>
                      <p><strong>Order Id: </strong>{{$order->id}}</p>
                       <p><strong>User Id:</strong> {{$order->user_id}}</p>
                      <p><strong>Payment Gateway:</strong> {{$order->payment_gateway}}</p>
                      <p><strong>Order date:</strong> {{$order->created_at}}</p>
                 </div>
                 @if($order->billing_address != null)
                 <div class="shipping-address">
                    <h3>Shipping Adress</h3>
                     <p><strong>Address:</strong> {{$order->billing_address}}</p>
                     <p><strong>City:</strong> {{$order->billing_city}}</p>
                    <p><strong>Province: </strong> {{$order->billing_province}}</p>
                 </div>
                 @endif
            </div>
        </section>
        <section class="promo">
            <div class="help-promo">
               <h3>We're here to help</h3>
               <p>Call 123456789 or <a href="#"> visit us online</a>
                for expert assistance.</p>
            </div>
            <div class="gurantee-promo">
               <h3>Our guarantee</h3>
               <p>Your satisfaction is 100% guaranteed.
              <a href="#">See our Returns and Exchanges policy</a></p>
            </div>
        </section>
        <footer class="footer">
            <div class="sticky-footer">
                <div class="footer-content">
                    <div class="made-with">
                        Made with <i class="fa fa-heart"></i> by Albert
                    </div>

                    <ul>
                        <li>Follow Us:</li>
                        <li><a href="#"><i class="fa fa-globe"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                        <li><a href="#"><i class="fa fa-github"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div><!--end of footer content-->

            </div>
        </footer>
    </div>

</body>
</html>
