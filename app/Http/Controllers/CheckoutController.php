<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Address;
use App\Order;
use storage;

class CheckoutController extends Controller
{
    public function index(){
    	if(Auth::check()){
            $cartItems = Cart::content();
    		return view('front.checkout',compact('cartItems'));
    	}else{
    		return redirect('/login');
    	}
    }

    public function formvalidate(Request $request){
    	$this->validate($request, [
    		'fullname' => 'required|min:5|max:35',
    		'city' => 'required|min:2|max:25',
    		'state' => 'required|min:2|max:25',
    		'country' => 'required',
    		'pincode' => 'required|numeric',
    	]);

    	$userid = Auth::user()->id;
    	$address = new Address;
    	$address->fullname = $request->fullname;
    	$address->city = $request->city;
    	$address->state = $request->state;
    	$address->country = $request->country;
    	$address->user_id = $userid;
    	$address->pincode = $request->pincode;
        $address->payment_type = $request->pay;
		$address->save();

		Order::createOrder();

        cart::destroy();
        return redirect('profile/thankyou');
    }
}
