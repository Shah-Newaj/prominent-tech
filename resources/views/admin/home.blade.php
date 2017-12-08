@extends('admin.master')

@section('title','Admin')

@section('content')
  <!-- container section start -->
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
            </div>
              
              </div><br><br>
        

                       <div class="col-md-6 portlets">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="pull-left"><h2><strong>Add Product</strong></h2></div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                
                <div class="panel-body">                   
                  <div class="padd">                    
                      <div class="form quick-post">
                            <form action="{{url('admin/add_product')}}" method="post" enctype="multipart/form-data">
                                Category: 
                                <Select class="form-control" name="cat_id">
                                    @foreach($cat_data as $cat)
                                     <option value="{{ $cat->id }}">{{ ucwords($cat->name) }}</option>
                                    @endforeach
                                </select>
                                <br>

                                Product Name:
                                <input type="text" name="pro_name" class="form-control"><br>
                                Product Code:
                                <input type="text" name="pro_code" class="form-control"><br>
                                Product Price:
                                <input type="text" name="pro_price" class="form-control"><br>
                                Product Info:
                                <input type="text" name="pro_info" class="form-control"><br>
                                Product Imge:
                                <input type="file" name="pro_img" class="form-control"><br>
                                SPL Price:
                                <input type="text" name="spl_price" class="form-control"><br>

                                <input type="submit" name="Submit" class="btn btn-primary">

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>         
                                      
                        </div>
                  

                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
              </div>
              
            </div>      
          </div> 
              <!-- project team & activity end -->

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