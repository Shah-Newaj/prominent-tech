<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Address;

class ProfileController extends Controller
{
	public function index(){
    	return view('profile.index');
    }

    public function orders(){
    	$user_id = Auth::user()->id;
    	$orders = DB::table('order_product')->leftJoin('products','products.id','=','order_product.product_id')->leftJoin('orders', 'orders.id', '=', 'order_product.order_id')->where('orders.user_id','=',$user_id)->get();
    	return view('profile.orders',compact('orders'));
    }

    public function address(){
    	$user_id = Auth::user()->id;
    	$address_data = DB::table('addresses')->where('addresses.user_id','=',$user_id)->get();
    	return view('profile.address',compact('address_data'));
    }

    public function updateAddress(Request $request){
    	$this->validate($request, [
    		'fullname' => 'required|min:5|max:35',
    		'city' => 'required|min:2|max:25',
    		'state' => 'required|min:2|max:25',
    		'country' => 'required',
    		'pincode' => 'required|numeric',
    	]);

    	$userid = Auth::user()->id;
    	DB::table('addresses')->where('user_id', $userid)->update($request->except('_token'));
		return back()->with('msg','Your Address Has Been Updated');
    }

    public function password(){
    	return view('profile.updatePassword'); 
    }

    public function updatePassword(Request $request){
   		$old_password = $request->old_password;
    	$new_password = $request->new_password;
    	

    	if(!Hash::check($old_password,Auth::user()->password)){
    		return back()->with('msg','The Specified Password Does Not Match');
    	}else{
    		$request->user()->fill(['password' => Hash::make($new_password)])->save(); //updating password
    		return back()->with('msg','Password has been Updated');
    	}
    }
}
