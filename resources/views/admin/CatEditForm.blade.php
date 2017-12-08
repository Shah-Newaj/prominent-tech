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
                            <h1>Edit Categories</h1>
                    <table class="table-borderless" style="height: 150px">
                    {!! Form::open(['url' => 'admin/editCat', 'method' => 'post']) !!}
                    @foreach($cats as $cat)
                      <input type="hidden" name="id" class="form-control" value="{{$cat->id}}">
                      <tr>
                      <td>Category Name:</td>
                      <td><input type="text" name="cat_name" value="{{$cat->name}}" class="form-control"></td>
                      </tr>
                      <tr>
                      <td>Category Status:</td>
                        <td>
                          <select name="status" class="form-control">
                            <option value="0" @if($cat->status == '0')
                                selected='selected'@endif>
                              Enable
                            </option>
                            <option value="1" @if($cat->status == '1')
                              selected='selected'@endif>
                              Disable
                            </option>
                          </select>
                        </td>
                      </tr>
                      @endforeach
                      <tr>
                        <td colspan="2">
                          <input type="submit" value="Update Category" class="btn btn-success pull-right">
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