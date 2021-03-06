@extends('admin.master')

@section('content')


  <section id="container" class="">
        @include('admin.sidebar')
        <section id="main-content">
            <section class="wrapper">

              <div class="content-box-large col-md-7">
                <h1>360 View images</h1>
                <?php $proImages = DB::table('pro_images')->where('proId', $proInfo[0]->id)->get();?>
                @if(count($proImages)!=0)
                <table class="table table-striped">
                  <tr>
                    <td>index</td>
                    <td>Product id</td>
                    <td>360 image</td>
                    <td>status</td>
                    <td>Change/Delete</td>
                  </tr>
                  @foreach($proImages as $img)
                  <tr>
                    <td>{{$img->id}}</td>
                    <td>{{$img->proId}}</td>
                  <td><img src="{{Config::get('app.url:8000')}}/images/pro_images/{{$img->pro_img}}" width="100px" height="100px"/></td>
                    <td>{{$img->status}}</td>
                    <td><a href="{{url('admin/EditThreeSixtyImage')}}/{{$img->id}}" class="
                      btn btn-success">Change</a>
                      <a href="{{url('admin/deletePro')}}/{{$img->id}}" class="btn btn-danger">Delete</a></td>
                  </tr>
                  @endforeach

                </table>
                @else
                <p class="alert alert-danger">this product have not any 360 images</p>
                @endif
              </div>



                <div class="content-box-large col-md-5 pull-right">
                    <h1>Add 360 View Images</h1>

                    {!! Form::open(['url' => 'admin/submitPro_img',  'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <table class="table-borderless" style="height:200px">

                        <tr>
                            <td> Product Name:</td>
                            <td>    <input type="text" name="pro_name" class="form-control"
                              value="{{$proInfo[0]->pro_name}}">
                               <input type="hidden" name="pro_id" class="form-control"
                               value="{{$proInfo[0]->id}}"></td>
                        </tr>

                        <tr>
                            <td> Upload Image:</td>
                            <td>    <input type="file" name="image" class="form-control"
                              value="{{$proInfo[0]->pro_name}}"></td>

                            </tr>

                         <tr>
                             <td colspan="2">
                        <input type="submit" value="Submit" class="btn btn-success pull-right">
                             </td>
                         </tr>

                        {!! Form::close() !!}
                    </table>
                </div>

            </section>
      </section>
</section>

@endsection
