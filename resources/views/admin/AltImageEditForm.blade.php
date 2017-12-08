@extends('admin.master')

@section('title','Admin')

@section('content')
  <section id="container" class="">
          @include('admin.sidebar')
      <!--main content start-->
    <section id="main-content">
      <section class="wrapper">            
              <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                  <li><i class="fa fa-laptop"></i>Dashboard</li>                          
              </ol>
          </div>
          <div class="col-md-6">

            <div class="content-box-large">
                  <h1>Update Image</h1>
                      
                    {!! Form::open(['url' => 'admin/editAltImage', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}

                    @foreach($products as $product)
                   
                    <input type="hidden" name="id" class="form-control" value="{{$product->id}}">

                    <br/>
                    <img src="{{url('images/alt_images',$product->alt_img)}}" alt="" width="200px" height="200px">

                    <br/>
                    Select Image:
                    <input type="file" name="new_image" class="form-control" >

                    @endforeach
                    <br/>
                    <input type="submit" value="Upload Image" class="btn btn-success pull-right">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    {!! Form::close() !!}            
                </div>
             </div>
         </section>
         <div class="text-right">
            <div class="credits">
            </div>
        </div>
      </section>
      <!--main content end-->
  </section>
  <!-- container section ends -->
@endsection