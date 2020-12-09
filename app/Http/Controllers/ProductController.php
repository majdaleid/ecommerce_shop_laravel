<?php
namespace App\Http\Controllers;

          use Illuminate\Support\Facades\Storage;
           use Illuminate\Http\Request;
          use App\Models\Product;
          use App\Models\Category;
          use Session;
          use App\Cart;
          use Illuminate\Support\Facades\Redirect;

          class ProductController extends Controller
          {
          /*todo model product category one to many */
                  public function products(){
                      $products=Product::get();
                    return view('admin.products')->with('products',$products);
                  }
                  public function addproduct(){
                    $categories=Category::All()->pluck('category_name','category_name');
                    return view('admin.addproduct')->with('categories',$categories);
                  }



            public function saveproduct(Request $request){
          //dd($request->input('product_category'));
              $this->validate($request,[
                'product_name'=>'required',
                'product_price'  =>'required',
                'product_image'=>'image|nullable|max:1999'
              ]);

              if($request->input('product_category')){

                if($request->hasfile('product_image')){
                //:get filename with ext
                $fileNameWithExt=$request->file('product_image')->getClientOriginalName();

                //2:get just $file name

                $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);

                //3: get just extention
                $extention=$request->file('product_image')->getClientOriginalExtension();


                //4:file name to store

                $fileNameToStore=$fileName.'_'.time().'.'.$extention;

                //upload image

                $path=$request->file('product_image')->storeAs('public/product_images',$fileNameToStore);
              }
              else{
              $fileNameToStore='noimage.jpg';
              }
              $product=new Product();
              $product->product_name=$request->input('product_name');
              $product->product_price=$request->input('product_price');
              $product->product_category=$request->input('product_category');
              $product->product_image=$fileNameToStore;
              $product->status=1;
              //$product->status=$request->input('product_status');
              /*
              if($request->input('product_status')){
              $product->status=1;
              }else{
                $product->status=0;
              }*/
              $product->save();
              return redirect('/addproduct')->with('status', 'the '.$product->product_name.' has been saved successfully');


              }
          else{
            return redirect('/addproduct')->with('status1', 'do select the category please');

              }

          }


          public function editproduct($id){
              $categories=Category::get();
            /*$categories=Category::All()->pluck('category_name','category_name');*/

            $product=Product::find($id);

          /*  $product=Product::where('id',$id)->get();*/
            return view('admin.editproduct')->with('product',$product)->with('categories',$categories);
          }



            public function updateproduct(Request $request){

              $this->validate($request,[
                'product_name'=>'required',
                'product_price'  =>'required',
                'product_image'=>'image|nullable|max:1999'
              ]);

             $product =Product::find($request->input('id'));

          $product->product_name=$request->input('product_name');
          $product->product_price=$request->input('product_price');
          $product->product_category=$request->input('product_category');

          if($request->hasfile('product_image')){
          //:get filename with ext
          $fileNameWithExt=$request->file('product_image')->getClientOriginalName();

          //2:get just $file name

          $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);

          //3: get just extention
          $extention=$request->file('product_image')->getClientOriginalExtension();


          //4:file name to store

          $fileNameToStore=$fileName.'_'.time().'.'.$extention;

          //upload image

          $path=$request->file('product_image')->storeAs('public/product_images',$fileNameToStore);

          if ($product->product_image !='noimage.jpg' ){
            Storage::delete('public/product_images/'.$product->product_image);


          }

          $product->product_image = $fileNameToStore;
          }





          $product->update();
          return redirect('/products')->with('status', 'the '.  $product->product_name.' product has been updated successfully');

          }



          public function deleteproduct($id){

          $product=Product::find($id);
           if ($product->product_image !='noimage.jpg' ){
          Storage::delete('public/product_images/'.$product->product_image);
            }
            $product->delete();
          return redirect('/products')->with('status', 'the '.  $product->product_name.'category has been deleted successfully');

          }


           public function activateproduct($id){
             $product =Product::find($id);
             $product->status=1;
             $product->update();
             return redirect('/products')->with('status', 'the  status has been activated successfully');

           }


           public function unactivateproduct($id){
             $product =Product::find($id);
             $product->status=0;
             $product->update();
             return redirect('/products')->with('status', 'the  status has been deactivated successfully');


           }
           public function addToCart($id)
           {
             $product =Product::find($id);
              //  die($product);
            // print_r($product);
            $oldCart=Session::has('cart')? Session::get('cart'):null;
            $cart=new Cart($oldCart);
            //print_r($cart);
            $cart->add($product,$id);
            //print_r($cart);

            Session::put('cart', $cart);


        //dd(Session::get('cart'));

           return redirect::to('/shop');

           }




          }
