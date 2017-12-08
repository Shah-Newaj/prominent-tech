@extends('front.master')

@section('title','Profile')

@section('content')
<style type="text/css">
	table td {padding: 10px}
</style>
  
<section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                  <li><a href="{{url('/profile')}}">Profile</a></li>
                  <li class="active">My Orders</li>
                </ol>
            </div><!--/breadcrums-->

    <div class="row">
        @include('profile.menu')
        <div class="col-md-8">
            <h3><span style="color: green">{{Auth::user()->name}}</span>, Your Orders</h3>
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Product Name</th>
                    <th>Product Code</th>
                    <th>Order Total</th>
                    <th>Order Status</th>
                    <th>Details</th>
                </tr>
            </thead>

            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->pro_name}}</td>
                    <td>{{$order->pro_code}}</td>
                    <td>{{$order->total}}</td>
                    <td>{{$order->status}}</td>
                    <td>View</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
	</div>
</section>
@endsection