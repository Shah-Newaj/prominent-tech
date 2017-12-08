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
                  <li class="{{url('/address')}}">Update Password</li>
                </ol>
            </div><!--/breadcrums-->

    <div class="row">
        @include('profile.menu')
        <div class="col-md-8">
            
            @if(session('msg'))
                <div class="alert alert-info">{{session('msg')}}</div>
            @endif

            <h3><span style="color: green">{{Auth::user()->name}}</span>, Update Your Password</h3>

            {!! Form::open(['url' => 'updatePassword', 'method' => 'post']) !!}
            
             <div class="container">
                <div class="form-group row">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="col-2 col-form-label">Current Password</label><br>
                        <input class="form-control" type="password" name="old_password">
                        <span style="color:red">{{ $errors->first('old_password') }}</span>
                        
                        <br>

                        <label for="example-text-input" class="col-2 col-form-label">New Password</label><br>
                        <input class="form-control" type="password" name="new_password">
                        <span style="color:red">{{ $errors->first('new_password') }}</span>
                        
                        <br>

                        <div align="right"><input type="submit" value="Update Password" class="btn btn-primary"></div>
                   </div>
                   
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
	</div>
</section>
@endsection