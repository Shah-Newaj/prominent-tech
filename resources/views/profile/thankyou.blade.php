@extends('front.master')

@section('title','Profile')

@section('content')

    <h1 align="center">{{Auth::user()->name}}</h1>

                <h3 class="panel-body" align="center"> 
                     Thank You. Your Order Has Been Placed
                </h3>

@endsection