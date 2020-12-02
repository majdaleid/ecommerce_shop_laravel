@extends('layouts.appadmin')
@section('content')

          <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit category</h4>
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
                  <form class="cmxform" id="commentForm" method="POST" action="{{route('updatecategory')}}">
                   {{csrf_field()}}
                      <div class="form-group">
                        <input type="hidden" id="custId" name="id" value="{{$category->id}}}">
                        <label for="cname">Products Category</label>
                        <input id="cname" class="form-control" name="category_name" minlength="2" type="text" value="{{$category->category_name}}" required>
                      </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
@endsection

@section('scripts')

<script src="{{asset('backend/js/bt-maxLength.js')}}"></script>
@endsection
