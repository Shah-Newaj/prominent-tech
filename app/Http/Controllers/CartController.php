<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart; //for cart library

class CartController extends Controller
{
    public function index(){
    	$cartItems = Cart::content();
    	return view('cart.index',compact('cartItems'));
    }

    public function addItem($id){
    	$product = Product::find($id); //get product by id
        Cart::add($id,$product->pro_name,1,$product->pro_price,['img' => $product->pro_img]); //'$id'

        return back();
    }

    public function update(Request $request, $id)
    {
        $qty = $request->qty;
        $proId = $request->proId;
        $rowId = $request->rowId;
        Cart::update($rowId,$qty); // for update
        $cartItems = Cart::content(); // display all new data of cart
        return view('cart.upCart', compact('cartItems'))->with('status', 'cart updated');
    }

    public function destroy($id)
    {
        Cart::remove($id);
        return back();
    }

   
}
