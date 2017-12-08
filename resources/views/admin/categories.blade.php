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
	             			<h1>View Categories</h1>
                   
                    <table class="table table-striped">
                      <thead>
                        <th>Category Id</th>
                        <th>Category Name</th>
                        <th>Status</th>
                        <th>Update/Delete</th>
                      </thead>
                      @foreach($cats as $cat)
                      <tbody>
                      <tr>
                        <td>{{$cat->id}}</td>
                        <td>{{$cat->name}}</td>
                        <td>@if($cat->status=='0')
                          Enable
                          @else
                          Disable
                        @endif</td>
                        <td><a href="{{url('admin/editCategory')}}/{{$cat->id}}" class="btn btn-info">Edit</a>
                        <a href="{{url('admin/deleteCat')}}/{{$cat->id}}" class="btn btn-danger">Delete</a></td>
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