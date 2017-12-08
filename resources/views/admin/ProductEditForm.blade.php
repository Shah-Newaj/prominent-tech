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
          <div class="col-md-7">

            <div class="content-box-large">
                  <h1>Edit Products</h1>
                      <?php $cats= DB::table('pro_cat')->get(); ?>
                    {!! Form::open(['url' => 'admin/editPro', 'method' => 'post']) !!}
                        @foreach($products as $product)
                          Category:
                          <select name="cat_id" class="form-control">
                            @foreach($cats as $cat)
                              <option value="{{$cat->id}}" @if($product->cat_id == $cat->id)
                                selected='selected'@endif>{{$cat->name}}</option>
                            @endforeach
                          </select>

                          <input type="hidden" name="id" class="form-control" value="{{$product->id}}">                     
                          Product Name:
                          <input type="text" name="pro_name" value="{{$product->pro_name}}" class="form-control"><br>
                          Product Code:
                          <input type="text" name="pro_code" value="{{$product->pro_code}}" class="form-control"><br>
                          Product Price:
                          <input type="text" name="pro_price" value="{{$product->pro_price}}" class="form-control"><br>
                          Product Info:
                          <input type="text" name="pro_info" value="{{$product->pro_info}}" class="form-control"><br>
                          SPL Price:
                          <input type="text" name="spl_price" value="{{$product->spl_price}}" class="form-control"><br>
                        @endforeach
                          <input type="submit" value="Update Product" class="btn btn-success pull-right"><br>
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {!! Form::close() !!}
                  </div>
            </div>
                    <div class="col-md-5 pull-right">                        
                      <img src="{{url('upload/images',$product->pro_img)}}" alt="" width="300px" height="300px">
                      <h3><a href="{{url('admin/EditImage')}}/{{$product->id}}">Change Image</a></h3>
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