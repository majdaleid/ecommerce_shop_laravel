@extends('layouts.appadmin')
@section('title')
add slider
@endsection
@section('content')

          <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">create slider</h4>
                  @if(Session::has('status'))
                  <div class="alert alert-success">
                    {{Session::get('status')}}
                  </div>
                  @endif
                  <form class="cmxform" id="commentForm" method="POST"   action="{{route('saveslider')}}" enctype="multipart/form-data">
                   {{csrf_field()}}
                      <div class="form-group">
                        <label for="cname">Description 1 </label>
                        <input id="cname" class="form-control" name="Description1"  type="text" required>
                      </div>
                      <div class="form-group">
                        <label for="cname">Description 2 </label>
                        <input id="cname" class="form-control" name="Description2"  type="text" required>
                      </div>

                      <div class="form-group">
                        <label for="cname">Slider image</label>
                        <input id="cname" class="form-control" name="slider_image"   type="file" required>
                      </div>
                      <div class="form-group">
                        <label for="cname">Slider Status</label>
                        <input id="cname" class="form-control" name="slider_status"  value="" type="checkbox" checked required>
                      </div>

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
