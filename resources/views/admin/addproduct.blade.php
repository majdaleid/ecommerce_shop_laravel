@extends('layouts.appadmin')
@section('title')
add Product
@endsection
@section('content')

          <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">create product</h4>
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
                  <form method="post" action="{{route('saveproduct')}}" enctype="multipart/form-data">
                   @csrf

                      <div class="form-group">
                        <label for="cname">Product Name</label>
                        <input id="cname" class="form-control" name="product_name"  type="text" required>
                      </div>
                      <div class="form-group">
                        <label for="cname">Product price</label>
                        <input id="cname" class="form-control" name="product_price"   type="number" required>
                      </div>
                      <div class="form-group">
                        <label for="cname">Product category</label>
                        <select id="cars" name="product_category" class="form-control" >
                          @foreach($categories as $category)
                          <option value="{{$category}}">{{$category}}</option>
@endforeach
                        </select>

                      </div>
                      <div class="form-group">
                        <label for="cname">Product image</label>
                        <input id="cname" class="form-control" name="product_image"   type="file" required>
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
