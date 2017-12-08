<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Product;
use App\Wishlist;
use App\Recommend;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        return view('front.home');
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')->paginate(30); // now we are fetching all products
        return view('front.shop', compact('products'));
    }

    public function shop(Request $request)
    {
        if($request->ajax()){
            if ($request->ajax() && isset($request->start)) {
                $start = $request->start; // min price value
                $end = $request->end; // max price value

                $products = DB::table('products')
                        ->where('pro_price', '>=', $start)->where('pro_price', '<=', $end)->orderby('pro_price', 'ASC')->paginate(30);

                 response()->json($products); //return to ajax
                return view('front.products', compact('products'));
            }
            else if(isset($request->brand)){

               $brand = $request->brand; //brand

                $products = DB::table('products')->whereIN('cat_id', explode( ',', $brand ))->paginate(30);
                response()->json($products); //return to ajax
                return view('front.products', compact('products'));
            }
            else{
                $products = DB::table('products')->paginate(30); // now we are fetching all products
                return view('front.products', compact('products'));
            }
        }
        else{
            $products = DB::table('products')->paginate(30); // now we are fetching all products
            return view('front.shop', compact('products'));
        }
    }

    public function proCats(Request $request)
    {
        if ($request->ajax() && isset($request->start)) {
            $start = $request->start; // min price value
            $end = $request->end; // max price value
            $catName = $request->name;
            $products = DB::table('pro_cat')->leftJoin('products', 'pro_cat.id', '=', 'products.cat_id')
                     ->where('pro_cat.name', '=', $catName)
                     ->where('pro_price', '>=', $start)
                    ->where('pro_price', '<=', $end)
                    ->orderby('pro_price', 'ASC')
                    ->paginate(30);
             response()->json($products); //return to ajax
            return view('front.products', compact('products'));
        } else if(isset($request->brand)){
            $brand = $request->brand; //brand
            $products = DB::table('products')->whereIN('cat_id', explode( ',', $brand ))->paginate(30);
             response()->json($products); //return to ajax
            return view('front.products', compact('products'));
        } else{
        $catName = $request->name;
        $products = DB::table('pro_cat')->leftJoin('products', 'pro_cat.id', '=', 'products.cat_id')->where('pro_cat.name', '=', $catName)->paginate(30);
         return view('front.shop', compact('products'));
        }
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function about()
    {
        return view('front.about');
    }

    public function features()
    {
        return view('front.features');
    }

    public function product_details($id)
    {
        //insert command for views
        if (Auth::check()) {
            $recommends = new Recommend;
            $recommends->user_id = Auth::user()->id;
            $recommends->pro_id = $id;
            $recommends->save();
        }
        

        //view product details
        $products = DB::table('products')->where('id', $id)->get();
        return view('front.product_details', compact('products'));
    }

    public function search(Request $request){
        $search = $request->search_data;
        if($search==''){
            return view('front.home');
            
        }else{

        $products = DB::table('products')->where('pro_name','like','%'.$search.'%')->paginate(12);
        return view('front.shop',['name'=>'Result: '.$search ],compact('products'));
        }
    }

    public function wishlist(Request $request){
    
        $wishlist = new Wishlist;
        $wishlist->pro_id = $request->pro_id;
        $wishlist->save();

        $products = DB::table('products')->where('id', $request->pro_id)->get();
        return redirect('/');
    }

    public function view_wishlist(){
        $products = DB::table('wishlists')->leftJoin('products', 'wishlists.pro_id', '=', 'products.id')->paginate(12);
        return view('front.wishlist', compact('products'));
    }

    public function remove_wishlist($id){
        DB::table('wishlists')->where('pro_id', '=', $id)->delete();

        return back()->with('msg', 'Item Removed from Wishlist');
    }

    public function addReview(Request $request){
        DB::table('reviews')->insert(
        ['person_name' => $request->person_name, 
        'person_email' => $request->person_email,
        'review_content' => $request->review_content,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' =>date("Y-m-d H:i:s")]
        );
        return back();
    }

}
