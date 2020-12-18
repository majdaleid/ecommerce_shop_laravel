@extends('layouts.appadmin')
@section('title')
orders
@endsection
@section('content')


<input type="hidden" id="custId" name="custId" value="{{$increment=1}}">


<div class="card">
  <div class="card-body">
    <h4 class="card-title">Orders</h4>
    @if(Session::has('status'))
    <div class="alert alert-success">
      {{Session::get('status')}}
    </div>
    @endif
    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <table id="order-listing" class="table">
            <thead>
              <tr>
                  <th>Order #</th>
                  <th>Client Name</th>
                  <th>Address</th>
                  <th>Cart</th>
                  <th>Payment_id</th>
                  <th>Actions</th>
                  <th>Status</th>
                  <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($orders as $order)
              <tr>
                  <td>{{$increment}}</td>
                  <td>{{$order->name}}</td>
                  <td>{{$order->address}}</td>
                  <td>
                    @foreach($order->cart->items as $item)
                    {{$item['product_name'].','}}
                    @endforeach
                  </td>
                  <td>{{$order->payment_id}}</td>

                  <td>
                    <label class="badge badge-info">On hold</label>
                  </td>
                  <td>
                    <button class="btn btn-outline-primary">View</button>
                  </td>
              </tr>
              <input type="hidden" id="custId" name="custId" value="{{$increment=$increment+1}}">

               @endforeach



            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="{{asset('backend/js/data-table.js')}}"></script>
@endsection
