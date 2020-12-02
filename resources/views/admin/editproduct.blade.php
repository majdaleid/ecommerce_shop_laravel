@extends('layouts.appadmin')
@section('title')
edit Product
@endsection
@section('content')

          <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">edit product</h4>
                  @if(Session::has('status'))
                  <div class="alert alert-success">
                    {{Session::get('status')}}
                  </div>
                  @endif
                  @if(Session::has('status1'))
                  <div class="alert alert-danger">
                    {{Session::get('status1')}}
                  </div>
                  @endif
                  <form method="post" action="{{route('updateproduct')}}" enctype="multipart/form-data">
                   @csrf
                   <input type="hidden" id="custId" name="id" value="{{$product->id}}}">

                      <div class="form-group">
                        <label for="cname">Product Name</label>
                        <input id="cname" class="form-control" name="product_name"  type="text" value="{{$product->product_name}}" required>
                      </div>
                      <div class="form-group">
                        <label for="cname">Product price</label>
                        <input id="cname" class="form-control" name="product_price"   type="number" value="{{$product->product_price}}"required>
                      </div>
                      <div class="form-group">
                        <label for="cname">Product category</label>
                        <select id="cars" name="product_category" class="form-control" >
                               @foreach($categories as $category)

 <option value="{{$category->category_name}}" {{$category->category_name == $product->product_category  ? "selected" : '' }}>

{{$category->category_name}}
                              </option>
                           @endforeach
                         </select>

                      </div>
                      <div class="form-group">
                        <label for="cname">Product image</label>
                        <input id="cname" class="form-control" name="product_image"  value="{{$product->product_image}}"  type="file" required>
                        {{$product->product_image}}
                      </div>
                      <!--
                      <div class="form-group">
                        <label for="cname">Product Status</label>
                        <input id="cname" class="form-control" name="product_status"  value="" type="checkbox" checked required>
                      </div>
                    -->

                        <button type="submit" class="btn btn-primary">Save</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
@endsection

@section('scripts')

<script src="{{asset('backend/js/bt-maxLength.js')}}"></script>
@endsection
