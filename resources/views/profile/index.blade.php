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
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('/profile')}}">My Profile</a></li>
                </ol>
            </div>
        
       <div class="row">
        @include('profile.menu')
        <div class="col-md-8">
            <h3>Hi,<span style="color: green">{{Auth::user()->name}}</span></h3>
            <h2>Welcome to your profile</h2>
        </div>
    </div>
    </div>
</section>      

@endsection