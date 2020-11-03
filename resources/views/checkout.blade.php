@extends('partials.pagetemplate')

@section('page-content')
<div class="container">
    @include('partials.messages')
    <div class="featured padding-medium">
        <hr class="line">
            <h1>Checkout</h1>
        <hr class="line">
    </div>

 <div class="checkout-content">
    <div class="checkout-form">

        <h3 class="padding-medium">Billing Details</h3>

        <form action="{{route('checkout.store')}}" id="payment-form" method="POST">
            @csrf
              <div class="form-group">
                <label for="Email Address" class="form-label">Email Address</label>
              <input class="form-control" type="email" name="email" id="email" value="{{ old('email')}}" required>
              </div>

               <div class="form-group">
                    <label for="Name" class="form-label">Name</label>
                    <input class="form-control" type="text" id="name" name="name" value="{{ old('name')}}" required>
               </div>

               <div class="form-group"  >
                    <label for="Address" class="form-label">Address</label>
                    <input class="form-control" type="text" id="address" name="address" value="{{ old('address')}}" required>
               </div>

                <div class="billing-details-subpart">
                    <div class="form-group city">
                        <label for="City" class="form-label">City</label>
                        <input class="form-control" type="text" id="city" name="city" value="{{ old('city')}}" required>
                    </div>

                    <div class="form-group province">
                        <label for="Province" class="form-label">Province</label>
                        <input class="form-control" type="text" id="province" name="province" value="{{ old('province')}}" required>
                    </div>

                    <div class="form-group postal-code">
                        <label for="Postal Code" class="form-label">Postal Code</label>
                        <input class="form-control" type="text" id="postalcode" name="postalcode" value="{{ old('postalcode')}}" required>
                    </div>

                    <div class="form-group phone">
                        <label for="Phone"  class="form-label">Phone</label>
                        <input class="form-control" type="text" id="phone" name="phone" value="{{ old('phone')}}" required>
                    </div>
                </div>

                <div class="payment-details">

                    <h3 class="padding-medium">Payment Details</h3>
                       <div class="form-group">
                            <label for="Name On Card" class="form-label">Name On Card</label>
                            <input class="form-control" type="text" id="name_on_card" name="name_on_card">
                       </div>

                       <div class="form-group">
                            <label for="card-element"> Credit or debit card </label>

                            <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>

                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>

                       </div>

                <button type="submit" id="complete_order" class="btn-checkout text-center">Complete Order</button>
        </form>
    </div>

        <div class="checkout-information">

             <h2 class="padding-medium">Your Order</h2>

             @foreach (Cart::content() as $item)
                    <hr>
                    <div class="checkout-item">
                        <div class="checkout-image">
                            <img src="{{  productImage($item->model->image)}}" width="" alt="">
                        </div>

                        <div class="checkout-details">

                            <h5>{{$item->model->name}}</h5>

                            <p>{{$item->model->details}}</p>
                        </div>

                        <div class="checkout-items-price">
                            ${{$item->model->price}}
                        </div>

                        <div class=" checkout-items-quantity">
                          <h3 class="checkout-quantity">{{$item->qty}}</h3>
                        </div>
                    </div>
                    <hr>
             @endforeach


            <div class="checkout-price-calc">
                    <div class="checkout-left-pricing">
                        <p>Subtotal </p>
                        @if (session()->has('coupon'))
                            Discount ({{ session()->get('coupon') ['name'] }}):
                            <form action="{{ route('coupon.destroy')}}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-transparent">Remove Coupon</button>
                            </form>
                            <hr class="margin-sm">
                            <p>New Subtotal</p>
                        @endif
                         <p>Tax (18%) </p>
                         <p>Total </p>
                    </div>
                    <div class="checkout-right-pricing">
                         <p>${{ Cart::subtotal() }}</p>
                          @if (session()->has('coupon'))
                             <p>-${{ $discount }}</p>
                             <br><hr>
                             <p>${{ $newSubtotal }}</p>
                          @endif
                            <p>${{ $newTax }}</p>
                            <p>${{ $newTotal }}</p>
                    </div>
            </div>
            @if (session()->has('coupon'))  @else  <hr>  @endif

        @if (! session()->has('coupon'))
            <div class="checkout-item-code">
                <p> <strong> Have A Code ?</strong></p>
                <div class="apply-coupon">
                    <form action="{{route('coupon.store')}}" method="POST">
                        @csrf
                        <input type="text" name="coupon_code" id="coupon_code">
                        <button type="submit" class="btn-primary">Apply</button>
                    </form>
                </div>
            </div>
        @endif

    </div>
 </div>
</div>
@endsection

@section('scripts')
<script src="https://js.stripe.com/v3/"></script>

<script>
   (function(){// Create a Stripe client.
        var stripe = Stripe('pk_test_51HclfDCntmv3C11PtW05w3yf77IDmodvtRgjhjr49F21VTXGwkCyBSCQxZhKmelQBYOJFRnWejd82nu28OUFdwR100hhuW4IPR');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Roboto","Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
            color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {
            style: style,
            hidePostalCode:true
            });

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
        event.preventDefault();


        //Disable the submit button to prevent repeated clicks
         document.getElementById('complete_order').disabled = true;

        var options = {
            name: document.getElementById('name_on_card').value,
            address_line1: document.getElementById('address').value,
            address_city: document.getElementById('city').value,
            address_state: document.getElementById('province').value,
            address_zip: document.getElementById('postalcode').value
        }

        stripe.createToken(card , options).then(function(result) {
            if (result.error) {
            // Inform the user if there was an error.
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;

              //Enable submit btn
              document.getElementById('complete_order').disabled =false;

            } else {
            // Send the token to your server.
            stripeTokenHandler(result.token);
            }
        });
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
}})();
</script>
@endsection
