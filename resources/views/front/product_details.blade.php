@extends('front.master')

@section('title','Details')

@section('content')

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="left-sidebar">
						<h2>Product Details</h2>
						@foreach($products as $product)
						<div class="product-information"><!--/product-information-->
								<img src="" class="newarrival" alt="" />
								<h2>{{$product->pro_name}}</h2>
								<p>Web Id: {{$product->pro_code}}</p>	
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span>BDT: {{$product->pro_price}}</span><br>
									<label>Quantity:</label>
									<input type="text" value="3" />
																										
								</span>
								<p><b>Availability:</b> In Stock</p>
								<p><b>Condition:</b> New</p>								
								<a href="{{url('cart/addItem')}}/{{$product->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        	

							<!-- wishlist code starts -->
							<?php
                            //wishlist Code start
                            if(Auth::check()){
                            $wishData = DB::table('wishlists')->leftJoin('products', 'wishlists.pro_id', '=', 'products.id')->where('wishlists.pro_id', '=',$product->id)->get();
                     
                            $count = App\Wishlist::where(['pro_id' => $product->id])->count();
                            ?>
                            <?php if($count=="0"){?>
							<form action="{{url('addToWishlist')}}" method="post">
								{{ csrf_field() }}
								<input type="hidden" value="{{$product->id}}" name="pro_id">
								<button type="submit" class="btn btn-fefault cart">
								<i class="fa fa-star"></i>
									Add to Wishlist
								</button>							
							</form>
							<?php } else {?>
                            <h5 style="color:green"> Added to <a href="{{url('/wishlist')}}">wishList</a></h5>
                            <?php }
                            }?>
                            
						</div><!--/product-information-->
						@endforeach
					</div>
				</div>
				@foreach($products as $product)
				<div class="col-sm-8 padding-right">

					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">	
								<?php  $proImgs = DB::table('pro_images')->where('proID', $product->id)->get();   ?>
                        @if(count($proImgs)!=0)			
								<div class="rotatebox">
									<div class="images">
                                      
									</div>
									<div class="slider"></div>
									
								</div>
								 @endif
							</div>
							<div><h4> Move The Seek Bar for 360 view</h4></div>
							

						</div>
						<div class="col-sm-7 pull-right">
							
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								<?php  $altImgs = DB::table('alt_images')->where('proID', $product->id)->get();   ?>
                        @if(count($altImgs)!=0)
                                                                                              
                                <div id="basicCube">
									@foreach($altImgs as $altImg)
                                  <img src="{{Config::get('app.url:8000')}}/images/alt_images/{{$altImg->alt_img}}"/>
                                   @endforeach
                                </div>
                                <h3 align="Center">{{$product->pro_name}} <br> Images</h3>

                              
                              @endif
																					 
							</div>
							
						</div>
					</div><!--/product-details-->
					</div>
				<div class="col-sm-12">
					<?php $reviews = DB::table('reviews')->get();
					$count_reviews = count($reviews);?>
					        <div class="category-tab shop-details-tab"><!--category-tab-->
					                <div class="col-sm-12">
					                    <ul class="nav nav-tabs">
					                        <li class="active"><a href="#details" data-toggle="tab">Details</a></li>					   
					                        <li ><a href="#reviews" data-toggle="tab">Reviews ({{$count_reviews}})</a></li>
					                    </ul>
					                </div>
					                <div class="tab-content">
					                    <div class="tab-pane fade active in col-md-6" id="details" >
					                      <p>{{$product->pro_info}}</p>
					                    </div>					                   

					                    <div class="tab-pane fade " id="reviews" >
					                        <div class="col-sm-12">

					                          @foreach($reviews as $review)
					                            <ul>
					                                <li><a href=""><i class="fa fa-user"></i>{{$review->person_name}}</a></li>
					                                <li><a href=""><i class="fa fa-clock-o"></i>
					                                  {{date('H: i', strtotime($review->created_at))}}</a></li>
					                                <li><a href=""><i class="fa fa-calendar-o"></i>
					                                    {{date('F j, Y', strtotime($review->created_at))}}</a></li>
					                            </ul>
					                            <p>{{$review->review_content}}</p>
					                            @endforeach
					                            <p><b>Write Your Review</b></p>

					                            <form action="{{url('/addReview')}}/{{$product->id}}" method="post">
					                              {{ csrf_field() }}
					                                <span>
					                                    <input type="text" name="person_name" placeholder="Your Name"/>
					                                    <input type="email", name="person_email" placeholder="Email Address"/>
					                                </span>
					                                <textarea name="review_content" ></textarea>

					                                <button type="submit" class="btn btn-default pull-right">
					                                    Submit
					                                </button>
					                            </form>
					                        </div>
					                    </div>

					                </div>
					            </div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						@include('front.recommends')					
						</div>
					</div><!--/recommended_items-->
					</div>
				</div>
				
			@endforeach
			</div>
		</div>
	</section>
@endsection

@section('css')
<!-- 360 image -->
<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/ui-lightness/jquery-ui.css"/>
<link rel="stylesheet" href="{{asset('css/rotate.css')}}" media="all">
<!-- image cube -->
<style>
#basicCube { width: 350px; height: 350px; }
</style>


@endsection

@section('scripts')
<!-- image cube -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- 360 image -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="{{asset('js/rotate.js')}}"></script>



<script>
 // 360 image
rotate([
	
 <?php foreach ($proImgs as $proImg): ?>
 	"{{Config::get('app.url:8000')}}/images/pro_images/{{$proImg->pro_img}}",
 <?php endforeach ?>

]);
</script>
 <!-- image cube -->

<script src="{{asset('js/jquery.plugin.js')}}"></script>
<script src="{{asset('js/jquery.imagecube.js')}}"></script>
<script type="text/javascript">
	

	$(function () {
		$('#basicCube').imagecube();
	});	
</script>
@endsection