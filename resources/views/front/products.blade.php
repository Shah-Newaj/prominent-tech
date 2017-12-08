<div class="features_items"> <!--features_items-->
      <b> Total Products</b>:  {{$products->total()}}
                    <h2 class="title text-center">
                       
                        @if (isset($msg))
                            echo $msg;
                        @else
                         Feature Items </h2>
                        @endif

                    @if ($products->isEmpty())
                        <h2>Sorry,No Products in this Range</h2>
                    @else

                        @foreach($products as $product)
                        <div class="col-sm-4" >
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="{{url('/product_details')}}/{{$product->id}}">
                                            <img src="{{asset('upload/images')}}/{{$product->pro_img}}" alt="" width="50px" height="250px"/>
                                        </a>
                                        <h2 id="price">
                                            BDT{{$product->pro_price}}
                                        </h2>
                                        
                                        <p><a href="{{url('/product_details')}}/{{$product->pro_name}}"></a>{{$product->pro_name}}</p>

                                        <a href="{{url('/cart/addItem')}}/<?php echo $product->id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    
                                </div>
                                <div class="choose">
                                    <?php
                                    $wishData = DB::table('wishlists')->leftJoin('products', 'wishlists.pro_id', '=', 'products.id')->where('wishlists.pro_id', '=', $product->id)->get();
                                    $count = App\Wishlist::where(['pro_id' => $product->id])->count();
                                    ?>

                                    <?php if ($count == "0") { ?>
                                        <form action="{{url('/addToWishList')}}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="{{$product->id}}" name="pro_id"/>
                                            <p align="center">
                                                <input type="submit" value="Add to WishList" class="btn btn-primary"/>
                                            </p>
                                        </form>
                                    <?php } else { ?>
                                        <h5 style="color:green"> Added to <a href="{{url('/wishlist')}}">wishList</a></h5>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
</div>                    
                <ul class="pagination">
                    {{ $products->links()}}
                </ul>

                