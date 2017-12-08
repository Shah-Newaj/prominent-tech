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
             <div class="col-md-12">
                <div class="content-box-large">
                    <h1>View Products</h1>
                   
                    <table class="table table-striped">
                      <thead>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Product Code</th>
                        <th>Product Price</th>
                        <th>SPL Price</th>
                        <th>360 Images</th>
                        <th>Alt Image</th>
                        <th>Update/Delete</th>
                      </thead>
                      @foreach($products as $product)
                      <tbody>
                      <tr>
                        <td><img src="{{asset('upload/images')}}/{{$product->pro_img}}" alt="" width="100px" height="100px" /></td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->id}}</td>
                        <td>{{$product->pro_name}}</td>
                        <td>{{$product->pro_code}}</td>
                        <td>{{$product->pro_price}}</td>
                        <td>{{$product->spl_price}}</td>
                        <td>
                          <?php
                          $Pimgs = DB::table('pro_images')->where('proId', $product->id)
                          ->get();

                           ?>
                          <p> {{count($Pimgs)}} images found</p>

                          <a href="{{url('/admin/addPro_img')}}/{{$product->id}}" class="
                          btn btn-primary" style="border-radius:20px">
                          <i class="fa fa-plus"></i> Add</a> </td>
                        <td>
                          <?php
                          $Aimgs = DB::table('alt_images')->where('proId', $product->id)
                          ->get();

                           ?>
                          <p> {{count($Aimgs)}} images found</p>


                          <a href="{{url('/admin/addAlt')}}/{{$product->id}}" class="
                          btn btn-info" style="border-radius:20px">
                          <i class="fa fa-plus"></i> Add</a></td>                      
                        <td><a href="{{url('admin/editProduct')}}/{{$product->id}}" class="
                          btn btn-success">Edit</a>
                          <a href="{{url('admin/deletePro')}}/{{$product->id}}" class="btn btn-danger">Delete</a></td>
                        
                      </tr>
                      </tbody>
                      @endforeach
                    </table>
                    
                  </div>    
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