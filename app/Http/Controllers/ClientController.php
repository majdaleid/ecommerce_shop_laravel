<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
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

     public function cart() {
                 return view('client.cart');
         }

     public function checkout() {
                 return view('client.cart');
         }

}
