@extends('front.master')

@section('title','Details')

@section('content')

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Sportswear
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="">Nike </a></li>
											<li><a href="">Under Armour </a></li>
											<li><a href="">Adidas </a></li>
											<li><a href="">Puma</a></li>
											<li><a href="">ASICS </a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Mens
										</a>
									</h4>
								</div>
								<div id="mens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="">Fendi</a></li>
											<li><a href="">Guess</a></li>
											<li><a href="">Valentino</a></li>
											<li><a href="">Dior</a></li>
											<li><a href="">Versace</a></li>
											<li><a href="">Armani</a></li>
											<li><a href="">Prada</a></li>
											<li><a href="">Dolce and Gabbana</a></li>
											<li><a href="">Chanel</a></li>
											<li><a href="">Gucci</a></li>
										</ul>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#womens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Womens
										</a>
									</h4>
								</div>
								<div id="womens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="">Fendi</a></li>
											<li><a href="">Guess</a></li>
											<li><a href="">Valentino</a></li>
											<li><a href="">Dior</a></li>
											<li><a href="">Versace</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Kids</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Fashion</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Households</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Interiors</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Clothing</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Bags</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Shoes</a></h4>
								</div>
							</div>
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
									<li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
									<li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
									<li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
									<li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
									<li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
									<li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b>$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
						
					</div>
				</div>
				@foreach($products as $product)
				<div class="col-sm-9 padding-right">

					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<!-- <img src="{{$product->pro_img}}" alt="" /> -->
								<div class="rotatebox">
									<div class="images"> </div>
									<div class="slider"></div>
									<p> Move The Seek Bar </p>
								</div>
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
									<div id="basicCube">
										<img src="http://keith-wood.name/img/uluru.jpg" alt="Uluru" title="Uluru">
										<img src="http://keith-wood.name/img/islands.jpg" alt="Islands" title="Islands">
										<img src="http://keith-wood.name/img/gorge.jpg" alt="Gorge" title="Gorge">
									</div>
								  <!-- Wrapper for slides -->
								    <!-- <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img src="{{$product->pro_img}}" alt="" /></a>
										</div>
										<div class="item">
										  <a href=""><img src="{{$product->pro_img}}" alt="" /></a>
										</div>
										<div class="item">
										  <a href=""><img src="{{$product->pro_img}}" alt="" /></a>
										</div>
										
									</div> -->

								  <!-- Controls -->
								  <!-- <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a> -->
							</div>

						</div>
						<div class="col-sm-7">
							
							<div class="product-information"><!--/product-information-->
								<img src="" class="newarrival" alt="" />
								<h2>{{$product->pro_name}}</h2>
								<p>Web Id: {{$product->pro_code}}</p>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span>{{$product->pro_price}}</span>
									<label>Quantity:</label>
									<input type="text" value="3" />
									
									<a href="{{url('cart/addItem')}}/{{$product->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									
								</span>
								<p><b>Availability:</b> In Stock</p>
								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b> E-SHOPPER</p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>

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
								<i class="fa fa-shopping-cart"></i>
									Add to Wishlist
								</button>							
							</form>
							<?php } else {?>
                            <h5 style="color:green"> Added to <a href="{{url('/wishlist')}}">wishList</a></h5>
                            <?php }
                            }?>
							</div><!--/product-information-->
							
						</div>
					</div><!--/product-details-->
					
					<?php $reviews = DB::table('reviews')->get();
					$count_reviews = count($reviews);?>
					        <div class="category-tab shop-details-tab"><!--category-tab-->
					                <div class="col-sm-12">
					                    <ul class="nav nav-tabs">
					                        <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
					                        <li><a href="#tag" data-toggle="tab">Tag</a></li>
					                        <li ><a href="#reviews" data-toggle="tab">Reviews ({{$count_reviews}})</a></li>
					                    </ul>
					                </div>
					                <div class="tab-content">
					                    <div class="tab-pane fade active in" id="details" >
					                      <p>{{ $product->pro_info}}</p>
					                    </div>

					                    <div class="tab-pane fade" id="tag" >
					                      <li>tag1</li>   <li>tag2</li>
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

					                            <form action="{{url('/addReview')}}" method="post">
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
				
			@endforeach
			</div>
		</div>
	</section>
@endsection

@section('css')
<!-- image cube -->
<style>
#basicCube { width: 200px; height: 150px; }
</style>
<!-- 360 image -->
<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/ui-lightness/jquery-ui.css"/>
<link rel="stylesheet" href="{{asset('css/rotate.css')}}" media="all">


@endsection

@section('scripts')
<!-- image cube -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script src="{{asset('js/jquery.imagecube.js')}}"></script>
<script src="{{asset('js/jquery.plugin.js')}}"></script>
<!-- 360 image -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="{{asset('js/rotate.js')}}"></script>




<script>
 // 360 image
rotate([
	"{{asset('images/shoe/1.jpg')}}",
	"{{asset('images/shoe/2.jpg')}}",
	"{{asset('images/shoe/3.jpg')}}",
	"{{asset('images/shoe/4.jpg')}}",
	"{{asset('images/shoe/5.jpg')}}",
	"{{asset('images/shoe/6.jpg')}}",
	"{{asset('images/shoe/7.jpg')}}",
	"{{asset('images/shoe/8.jpg')}}",
	"{{asset('images/shoe/9.jpg')}}",
	"{{asset('images/shoe/10.jpg')}}",
	"{{asset('images/shoe/11.jpg')}}",
	"{{asset('images/shoe/12.jpg')}}",
	"{{asset('images/shoe/13.jpg')}}",
	"{{asset('images/shoe/14.jpg')}}",
	"{{asset('images/shoe/15.jpg')}}",
	"{{asset('images/shoe/16.jpg')}}",
	"{{asset('images/shoe/17.jpg')}}",
	"{{asset('images/shoe/18.jpg')}}",
	"{{asset('images/shoe/19.jpg')}}",
	"{{asset('images/shoe/20.jpg')}}",
	"{{asset('images/shoe/21.jpg')}}",
	"{{asset('images/shoe/22.jpg')}}",
	"{{asset('images/shoe/23.jpg')}}",
	"{{asset('images/shoe/24.jpg')}}",
	"{{asset('images/shoe/25.jpg')}}"
  
]);

// image cube
$(function () {
	$('#basicCube').imagecube();

});

</script>
@endsection