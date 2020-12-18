<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use Session;
  use App\Cart;

use Stripe\Charge;
use Stripe\Stripe;
use DB;
  use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{

  public function home() {

    $sliders=Slider::get();
    $products=Product::get();
    return view('client.home')->with('sliders',$sliders)->with('products',$products);

      }

  public function shop() {
    $categories=Category::get();
    $products=Product::get();
              return view('client.shop')->with('products',$products)->with('categories',$categories);
      }

      public function login2() {
                  return view('client.login');
         }

         public function register2() {
                     return view('client.register');
            }


            public function cart()
            {
              if(!Session::has('cart'))
              {
                return view('client.cart');
              }
              $oldCart=Session::has('cart')?Session::get('cart'):null;
              $cart=new Cart($oldCart);
              //dd($cart);
              return view('client.cart',['products'=>$cart->items,'sum_price'=>$cart->totalPrice]);

            }


     public function checkout() {
       if(!Session::has('cart')){
         return redirect('/cart');

       }
        return view('client.checkout');
         }

public function postcheckout(Request $request){
  if(!Session::has('cart')){
    return redirect('/cart');
  }
  $oldCart = Session::get('cart');
          $cart = new Cart($oldCart);

          Stripe::setApiKey('sk_test_51HwxTvHs1Fs3aFyYfjUAzMolhwvmP42PKjmxA4RKKX8r7Cj8utHaMIREGGEdvo6OG5Md9msfsGrY7D81fVPOhABh00Vvh6JiCW');
          try{
              $charge=Charge::create(array(
                  "amount" => $cart->totalPrice * 100,
                  "currency" => "usd",
                  "source" => $request->input('stripeToken'), // obtainded with Stripe.js
                  "description" => "Test Charge"
              ));


              $order=new Order();
              $order->name=$request->input('fullname2');
              $order->address=$request->input('address2');

              $order->cart=serialize($cart);
              $order->payment_id=$charge->id;
              
              $order->save();

          } catch(\Exception $e){
              Session::put('error', $e->getMessage());
              return redirect('/checkout');
          }

          Session::forget('cart');
          Session::put('success', 'Purchase accomplished successfully !');
          return redirect('/cart')->with('success','Purchase accomplished successfully !');





}





     public function updateqty(Request $request){
      //  print('the product id is '.$request->id.' And the product qty is '.$request->quantity);
 $oldCart = Session::has('cart')? Session::get('cart'):null;
  $cart = new Cart($oldCart);

  $cart->updateqty($request->id, $request->quantity);
          Session::put('cart', $cart);

          //dd(Session::get('cart'));
          return redirect::to('/cart');
     }

     public function removeitem($id){

       $oldCart=Session::has('cart')?Session::get('cart'):null;
       $cart=new Cart($oldCart);
       $cart->removeitem($id);

       if(count($cart->items)>0)
       {
         Session::put('cart',$cart);
       }
       else{
         Session::forget('cart');
       }
      return redirect::to('/cart');

     }


}
