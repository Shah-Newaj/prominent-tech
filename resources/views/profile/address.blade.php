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
                  <li class="{{url('/address')}}">My Address</li>
                </ol>
        </div><!--/breadcrums-->

    <div class="row">
        @include('profile.menu')
        <div class="col-md-8">
            
            @if(session('msg'))
                <div class="alert alert-info">{{session('msg')}}</div>
            @endif

            <h3><span style="color: green">{{Auth::user()->name}}</span>, Your Address</h3>
            
            {!! Form::open(['url' => 'updateAddress', 'method' => 'post']) !!}
            @foreach($address_data as $value)
             <div class="container">
                <div class="form-group row">
                   <div class="form-group col-md-6">
                        <label for="example-text-input" class="col-2 col-form-label">Full Name</label><br>
                        <input class="form-control" type="text" name="fullname" value="{{$value->fullname}}">
                        <span style="color:red">{{ $errors->first('fullname') }}</span>
                   </div>
                </div>
                <div class="form-group row">
                   <div class="form-group col-md-6">
                        <label for="example-text-input" class="col-2 col-form-label">City</label><br>
                        <input class="form-control" type="text" name="city" value="{{$value->city}}">
                        <span style="color:red">{{ $errors->first('city') }}</span>
                   </div>
                </div>
                <div class="form-group row">
                   <div class="form-group col-md-6">
                        <label for="example-text-input" class="col-2 col-form-label">State</label><br>
                        <input class="form-control" type="text" name="state" value="{{$value->state}}">
                        <span style="color:red">{{ $errors->first('state') }}</span>
                   </div>
                </div>
                <div class="form-group row">
                   <div class="form-group col-md-6">
                        <label for="example-text-input" class="col-2 col-form-label">Pin Code</label><br>
                        <input class="form-control" type="text" name="pincode" value="{{$value->pincode}}">
                        <span style="color:red">{{ $errors->first('pincode') }}</span>
                   </div>
                </div>
                <div class="form-group row">
                   <div class="form-group col-md-6">
                        <label for="example-text-input" class="col-2 col-form-label">Country</label><br>
                        <input class="form-control" type="text" name="country" value="{{$value->country}}">
                        <span style="color:red">{{ $errors->first('country') }}</span>
                   </div>
                </div>
                
                <div class="form-group row">
                  <div class="form-group col-md-6" align="right">
                    <input type="submit" value="Update Address" class="btn btn-primary">
                    </div>      
                  </div>
                </div>
                @endforeach
            {!! Form::close() !!}
            
        </div>
    </div>
	</div>
</section>
@endsection