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
             <div class="col-md-10">

	             		<div class="content-box-large">
	             			<h1>Add Categories</h1>
                    <table class="table-borderless" style="height: 150px">
                    {!! Form::open(['url' => 'admin/catForm', 'method' => 'post']) !!}
                    
                      <tr>
                      <td>Category Name:</td>
                      <td><input type="text" name="cat_name" class="form-control"></td>
                      </tr>
                      
                      <tr>
                        <td colspan="2">
                          <input type="submit" value="Add Category" class="btn btn-success pull-right">
                        </td>
                      </tr>

                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                    {!! Form::close() !!}
                    </table>
	             		</div>
	             		


	             	<div class="col-md-6">
	             		<div class="content-box-large">
	             			
	             		</div>
	             		
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