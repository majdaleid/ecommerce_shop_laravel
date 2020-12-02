<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
      use Illuminate\Support\Facades\Storage;
use App\Models\Slider;

class SliderController extends Controller
{

  public function sliders(){
    $sliders=Slider::get();
    return view('admin.sliders')->with('sliders',$sliders);
  }

  public function addslider(){
    return view('admin.addslider');
  }


  public function saveslider(Request $request){
//dd($request->input('product_category'));
$this->validate($request,[
  'Description1'=>'required',
  'Description2'  =>'required',
  'slider_image'=>'image|nullable|max:1999'
]);



  if($request->hasfile('slider_image')){
  //:get filename with ext
  $fileNameWithExt=$request->file('slider_image')->getClientOriginalName();

  //2:get just $file name

  $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);

  //3: get just extention
  $extention=$request->file('slider_image')->getClientOriginalExtension();


  //4:file name to store

  $fileNameToStore=$fileName.'_'.time().'.'.$extention;

  //upload image

  $path=$request->file('slider_image')->storeAs('public/slider_images',$fileNameToStore);
}
else{
$fileNameToStore='noimage.jpg';
}
$slider=new Slider();
$slider->discription1=$request->input('Description1');
$slider->discription2=$request->input('Description2');
$slider->slider_image=$fileNameToStore;
$slider->status=1;
//$product->status=$request->input('product_status');
/*
if($request->input('product_status')){
$product->status=1;
}else{
  $product->status=0;
}*/
$slider->save();
return redirect('/addslider')->with('status', 'the Slider has been saved successfully');

    }



    public function editslider($id){
        //$categories=Category::get();
      /*$categories=Category::All()->pluck('category_name','category_name');*/

      $slider=Slider::find($id);

    /*  $product=Product::where('id',$id)->get();*/
      return view('admin.editslider')->with('slider',$slider);
    }







    public function updateslider(Request $request){

      $this->validate($request,[
        'Description1'=>'required',
        'Description2'  =>'required',
        'slider_image'=>'image|nullable|max:1999'
      ]);


     $slider =Slider::find($request->input('id'));
    // dd($request);
     $slider->discription1=$request->input('Description1');
     $slider->discription2=$request->input('Description2');

  if($request->hasfile('slider_image')){
  //:get filename with ext
  $fileNameWithExt=$request->file('slider_image')->getClientOriginalName();

  //2:get just $file name

  $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);

  //3: get just extention
  $extention=$request->file('slider_image')->getClientOriginalExtension();


  //4:file name to store

  $fileNameToStore=$fileName.'_'.time().'.'.$extention;

  //upload image

  $path=$request->file('slider_image')->storeAs('public/slider_images',$fileNameToStore);

  if ($slider->slider_image !='noimage.jpg' ){
    Storage::delete('public/slider_images/'.$slider->slider_image);


  }

  $slider->slider_image = $fileNameToStore;
  }





  $slider->update();
  return redirect('/sliders')->with('status', 'the slider has been updated successfully');

  }


  public function deleteslider($id){

  $slider=Slider::find($id);
   if ($slider->slider_image !='noimage.jpg' ){
  Storage::delete('public/slider_images/'.$slider->slider_image);
    }
    $slider->delete();
  return redirect('/sliders')->with('status', 'the slider has been deleted successfully');

}


public function activateslider($id){
  $slider =Slider::find($id);
  $slider->status=1;
  $slider->update();
  return redirect('/sliders')->with('status', 'the  status has been activated successfully');

}


public function unactivateslider($id){
  $slider =Slider::find($id);
  $slider->status=0;
  $slider->update();
  return redirect('/sliders')->with('status', 'the  status has been deactivated successfully');


}




  }
