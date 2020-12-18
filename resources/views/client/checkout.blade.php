<link rel="stylesheet" href="src/css/checkout.css">

@extends("layouts.app")
@section('title')
Checkout
@endsection
@section('content')
   <div class="hero-wrap hero-bread" style="background-image: url('frontend/images/bg_1.jpg');">
     <div class="container">
       <div class="row no-gutters slider-text align-items-center justify-content-center">
         <div class="col-md-9 ftco-animate text-center">
           <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
           <h1 class="mb-0 bread">Checkout</h1>
         </div>
       </div>
     </div>
   </div>

   <section class="ftco-section">
     <div class="container">
       <div class="row justify-content-center">
         <div class="col-xl-7 ftco-animate">

             <form    method="POST" id="checkout-form" class="billing-form" action="{{route('postcheckout')}}">
              {{csrf_field()}}
             <h3 class="mb-4 billing-heading">Billing Details</h3>
             @if(Session::has('error'))
               <div class="alert alert-danger">
                 {{Session::get('error')}}
                  {{Session::put('error',null)}}
               </div>
             @endif
             <div class="row">


          <div class="col-50">
            <h3>Payment</h3>

    <label for="cnASDSDAame">Full name</label>
              <input type="text"  name="fullname2" placeholder="full name">
              <label for="cnASDDAQWName">the address</label>
              <input type="text"  name="address2" placeholder="address">
            <label for="cname">Name on Card</label>
            <input type="text" id="card-name" id="cname" name="cardname" placeholder="John More Doe">
            <label  for="ccnum">Credit card number</label>
            <input  id="card-number" type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="card-expiry-month" id="expmonth" name="expmonth" placeholder="September">

            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="card-expiry-year"id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input  id="card-cvc"type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>

        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="submit" value="Continue to checkout" class="btn">
           </form><!-- END -->
         </div>
         <div class="col-xl-5">
           <div class="row mt-5 pt-3">
             <div class="col-md-12 d-flex mb-5">
               <div class="cart-detail cart-total p-3 p-md-4">
                 <h3 class="billing-heading mb-4">Cart Total</h3>
                 <p class="d-flex">
                   <span>Subtotal</span>
                   <span>$20.60</span>
                 </p>
                 <p class="d-flex">
                   <span>Delivery</span>
                   <span>$0.00</span>
                 </p>
                 <p class="d-flex">
                   <span>Discount</span>
                   <span>$3.00</span>
                 </p>
                 <hr>
                 <p class="d-flex total-price">
                   <span>Total</span>
                   <span>${{Session::get('cart')->totalPrice}}</span>
                 </p>
               </div>
             </div>
             <div class="col-md-12">
               <div class="cart-detail p-3 p-md-4">
                 <h3 class="billing-heading mb-4">Payment Method</h3>
                 <div class="form-group">
                   <div class="col-md-12">
                     <div class="radio">
                        <label><input type="radio" name="optradio" class="mr-2"> Direct Bank Tranfer</label>
                     </div>
                   </div>
                 </div>
                 <div class="form-group">
                   <div class="col-md-12">
                     <div class="radio">
                        <label><input type="radio" name="optradio" class="mr-2"> Check Payment</label>
                     </div>
                   </div>
                 </div>
                 <div class="form-group">
                   <div class="col-md-12">
                     <div class="radio">
                        <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
                     </div>
                   </div>
                 </div>
                 <div class="form-group">
                   <div class="col-md-12">
                     <div class="checkbox">
                        <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
                     </div>
                   </div>
                 </div>
                 <p><a href="#"class="btn btn-primary py-3 px-4">Place an order</a></p>
               </div>
             </div>
           </div>
         </div> <!-- .col-md-8 -->
       </div>
     </div>
   </section> <!-- .section -->

@endsection



@section("script")



 <script src="https://js.stripe.com/v2/"></script>
 <script src="src/js/checkout.js"></script>
 <script>
   $(document).ready(function(){

   var quantitiy=0;
      $('.quantity-right-plus').click(function(e){

           // Stop acting like a button
           e.preventDefault();
           // Get the field name
           var quantity = parseInt($('#quantity').val());

           // If is not undefined

               $('#quantity').val(quantity + 1);


               // Increment

       });

        $('.quantity-left-minus').click(function(e){
           // Stop acting like a button
           e.preventDefault();
           // Get the field name
           var quantity = parseInt($('#quantity').val());

           // If is not undefined

               // Increment
               if(quantity>0){
               $('#quantity').val(quantity - 1);
               }
       });

   });
 </script>
@endsection
