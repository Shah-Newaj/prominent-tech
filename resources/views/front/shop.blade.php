@extends('front.master')

@section('scripts')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

@endsection

@section('title','Home')

@section('content')
<!-- jquery starts -->
<script>
$(document).ready(function(){
<?php $maxP = count($products);
  for($i=0;$i<$maxP; $i++) {?>
    $('#successMsg<?php echo $i;?>').hide();
    $('#cartBtn<?php echo $i;?>').click(function(){
      var pro_id<?php echo $i;?> = $('#pro_id<?php echo $i;?>').val();

      $.ajax({
        type: 'get',
        url: '<?php echo url('/cart/addItem');?>/'+ pro_id<?php echo $i;?>,
        success:function(){
        $('#cartBtn<?php echo $i;?>').hide();
        $('#successMsg<?php echo $i;?>').show();
        $('#successMsg<?php echo $i;?>').append('product has been added to cart');
        }
      });

    });
    <?php }?>
});
</script>
<!-- jquery ends -->
    
    <!--slider-->
    <section id="slider">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                            <li data-target="#slider-carousel" data-slide-to="3"></li>
                        </ol>
                        
                        <div class="carousel-inner">
                            <div class="item active">
                                
                                <div class="col-sm-6">
                                    <h1><span>S7</span> Edge</h1>
                                    <h2>Samsung</h2>
                                   
                                    <p>Fast battery charging: 60% in 30 min (Quick Charge 2.0) <br>Wireless charging (Qi/PMA) 
                                        <br> market dependent ANT+ support 
                                        <br>S-Voice natural language commands and dictation <br>OneDrive (115 GB cloud storage) 
                                        <br>Active noise cancellation with dedicated mic 
                                        <br>Photo/video editor Document editor </p>
                                
                                   
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{asset('images/home/mob1.jpg')}}" class="girl img-responsive" alt=""  width="450px" height="450px"/>                                
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>Mi</span> 5</h1>
                                    <h2>Xiaomi</h2>
                                    <p>Fingerprint, 
                                        <br>Fast battery charging, 
                                        <br>Photo/video editor, 
                                        <br>Document viewer </p>
                                  
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{asset('images/home/mob2.jpg')}}" class="girl img-responsive" alt=""  width="500px" height="500px"/>
                                </div>
                            </div>
                            
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>iPhone</span> X</h1>
                                    <h2>Apple</h2>
                                    <p>- Dolby Vision/HDR10 compliant
                                        <br>- Wide color gamut display
                                        <br>- 3D Touch display
                                        <br>- True-tone display </p>
                                   
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{asset('images/home/mob3.jpg')}}" class="girl img-responsive" alt=""  width="465px" height="465px"/>
                                </div>
                            </div>

                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>P10</span> PLUS</h1>
                                    <h2>Huawei</h2>
                                    <p>- Dolby Vision/HDR10 compliant
                                        <br>- Wide color gamut display
                                        <br>- 3D Touch display
                                        <br>- True-tone display </p>
                                   
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{asset('images/home/mob4.jpg')}}" class="girl img-responsive" alt=""  width="370px" height="370px"/>
                                </div>
                            </div>
                            
                        </div>
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!--/slider-->
    
<section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
     
                        <div class="price-range"><!--price-range-->
                                
                            <div class="well">
                                <h2>Price Range</h2>
                                    <div id="slider-range"></div>
                                    <br>
                                 
                                <b class="pull-left">BDT
                                        <input size="6" type="text" id="amount_start" name="start_price"
                                               value="30000" style="border:0px; font-weight: bold; color:green" readonly="readonly" /></b>

                                    <b class="pull-right">BDT
                                        <input size="6" type="text" id="amount_end" name="end_price" value="80000"
                                               style="border:0px; font-weight: bold; color:green" readonly="readonly"/></b>
                                                           
                            </div>
                        </div><!--/price-range-->

                        <div class="brands_products"><!--brands_products-->
                        <div class="brands-name">
                              <h2>Brands</h2>
                                <ul class="nav nav-pills nav-stacked">

                                    <?php $cats = DB::table('pro_cat')->orderby('name', 'ASC')->get();?>

                                    @foreach($cats as $cat)
                                    <li class="brandLi"><input type="checkbox" id="brandId" value="{{$cat->id}}" class="try"/>
                                 <span class="pull-right">({{App\Product::where('cat_id',$cat->id)->count()}})</span>
                                  <b>{{($cat->name)}}</b></li>
                                   @endforeach
                               </ul>
                        </div>
                    </div><!--/brands_products-->
                        
                        <div class="shipping text-center"><!--shipping-->
                            <img src="{{asset('images/home/shipping.jpg')}}" alt="" width="270px" />
                        </div><!--/shipping-->
                        
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right" id="updateDiv">

                    <div class="features_items"> <!--features_items-->
                        <b> Total Products</b>:  {{$products->total()}}
                    <h2 class="title text-center">
                       <?php
                        if (isset($msg)) {
                            echo $msg;
                        } else {
                            ?> Feature Items <?php } ?> </h2>

                    <?php if ($products->isEmpty()) { ?>
                      echo sorry, products not found;
                    <?php } else { 
                      $countP=0;?>
                      
                        @foreach($products as $product)
                        <input type="hidden" id="pro_id<?php echo $countP;?>" value="{{$product->id}}"/>
                        <div class="col-sm-4" >
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="{{url('/product_details')}}/{{$product->id}}">
                                            <img src="{{asset('upload/images')}}/{{$product->pro_img}}" alt="" width="50px" height="250px"/>
                                        </a>

                                        <h2 id="price">                          
                                          BDT {{$product->pro_price}}    
                                        </h2>

                                        <p><a href="{{url('/product_details')}}/{{$product->id}}">{{$product->pro_name}}</a></p>
                                      
                                           <button class="btn btn-default add-to-cart"
                                           id="cartBtn<?php echo $countP;?>"><i class="fa fa-shopping-cart"></i>Add to Cart</button>
                                           <div id="successMsg<?php echo $countP;?>" class="alert alert-success"></div>
                                    </div>

                                </div>
                                <div class="choose" align="center">
                                    <?php
                                    $wishData = DB::table('wishlists')->leftJoin('products', 'wishlists.pro_id', '=', 'products.id')->where('wishlists.pro_id', '=', $product->id)->get();
                                    $count = App\Wishlist::where(['pro_id' => $product->id])->count();
                                    ?>

                                    <?php if ($count == "0") { ?>
                                        <form action="{{url('/addToWishlist')}}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="{{$product->id}}" name="pro_id">
                                            <button type="submit" class="btn btn-fefault cart">
                                            <i class="fa fa-star"></i>
                                                Add to Wishlist
                                            </button>
                                        </form>
                                    <?php } else { ?>
                                        <h5 style="color:green"> Added to <a href="{{url('/wishlist')}}">wishList</a></h5>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                        <?php $countP++?>
                        @endforeach
                    <?php } ?>


                    </div>
                    <ul class="pagination">
                        {{ $products->links()}}
                    </ul>

                </div>
          
            </div>
        </div>
</section>

@section('css')
    <link href="{{asset('css/price-range.css')}}" rel="stylesheet">
@endsection

@endsection