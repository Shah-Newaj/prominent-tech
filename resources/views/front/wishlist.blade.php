@extends('front.master')

@section('title','Wishlist')

@section('content')

    <section id="advertisement">
        <div class="container">
            <img src="{{asset('images/shop/advertisement.jpg')}}" alt="" />
        </div>
    </section>
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        
                        
                        <div class="shipping text-center"><!--shipping-->
                            <img src="images/home/shipping.jpg" alt="" width="270px"/>
                        </div><!--/shipping-->
                        
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">
                          Wishlist Items
                        </h2>
                        
                        @forelse($products as $product)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="{{url('product_details')}}/{{$product->id}}">
                                        <img src="{{asset('upload/images')}}/{{$product->pro_img}}" alt=""  width="50px" height="250px"/>
                                        <h2>BDT {{$product->pro_price}}</h2>        
                                        <h3>{{$product->pro_name}}</h3>  
                                        </a>          
                                        <a href="{{url('cart/addItem')}}/{{$product->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="{{url('removeWishlist')}}/{{$product->id}}" style="color:red"><i class="fa fa-minus-square"></i>Remove from wishlist</a></li>                                
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @empty
                            <h3>No Products</h3>
                        @endforelse
                    </div>
                        <ul class="pagination">
                            <li class="active"><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">&raquo;</a></li>
                            
                        </ul>
                    <!--features_items-->
                </div>
            </div>
        </div>
    </section>

@endsection