<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
  public function addcategory(){
    $categories=Category::All()->pluck('category_name','category_name');
    return view('admin.addcategory');
  }

  public function categories(){
    $categories=Category::get();
    return view('admin.categories')->with('categories',$categories);
  }

  public function savecategory(Request $request){

    $this->validate($request,['category_name'=>'required']);

    $checkcat=Category::where('category_name',$request->input('category_name'))->first();
    $category=new Category();
    if(!$checkcat){
      $category->category_name=$request->input('category_name');
      $category->save();
      return redirect('/addcategory')->with('status', 'the '.  $category->category_name.' has been added');
    }else{
      return redirect('/addcategory')->with('status1', 'the '.$request->input('category_name').' category already exist');

//  dd($request);
    }
  }

  public function editcategory($id){
    $category=Category::find($id);
    return view('admin.editcategory')->with('category',$category);
  }

  public function updatecategory(Request $request){

   $category =Category::find($request->input('id'));

$oldcat=$category->category_name;

$category->category_name=$request->input('category_name');


/*when i update category , stay category in products without change that's why i should update it */
/*parameter in DB should be of the type array that's we should make an array*/



$data=array();
$data['product_category']=$request->input('category_name');
DB::table('products')->where('product_category',$oldcat)->update($data);


/*until here*/

$category->update();
return redirect('/categories')->with('status', 'the '.  $category->category_name.' category has been updated successfully');

}
public function deletecategory($id){

$category=Category::find($id);
$category->delete();
return redirect('/categories')->with('status', 'the '.  $category->category_name.'category has been deleted successfully');

}

public function view_by_cat($name)
{
  $categories=Category::get();
$products=Product::where('product_category',$name)->get();
return view('client.shop')->with('products',$products)->with('categories',$categories);

}

}
