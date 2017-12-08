<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Product;
use App\Pro_cat;
use storage;
use Image;

class AdminController extends Controller
{
    public function index(){
        // $this->middleware('auth');
        return view('admin.index');

    }
    //add product
    public function addpro_form(){
      $cat_data = DB::table('pro_cat')->get();

      return view('admin.home', compact('cat_data'));
    }
    
    public function add_product(Request $request){
    	$file = $request->file('pro_img');
     	$filename = $file->getClientOriginalName();

    	$path = 'upload/images';
    	$file->move($path,$filename);

    	$products = new Product;
    	$products->pro_name = $request->pro_name;
    	$products->pro_code = $request->pro_code;
    	$products->pro_price = $request->pro_price;
    	$products->pro_info = $request->pro_info;
    	$products->pro_img = $filename;
    	$products->spl_price = $request->spl_price;
        $products->cat_id = $request->cat_id;
		$products->save();

        $cat_data = DB::table('pro_cat')->get();

        return view('admin.home', compact('cat_data'));
    }

    //edit product
    public function ProductEditForm(Request $request){
        $productid = $request->id;
        $products = DB::table('products')
                    ->where('id', $productid)
                    ->get();

        return view('admin.ProductEditForm',compact('products'));
    }
    //update query to edit product
    public function editProduct(Request $request){
       $proid = $request->id;
        DB::table('products')
                    ->where('id', $proid)
                    ->update($request->except('_token'));
        $products = Product::all();
        return view('admin.products',compact('products'));                   
    }
    //view product
    public function view_products(){
        $products = DB::table('pro_cat')
        ->rightJoin('products','products.cat_id','=','pro_cat.id')
        ->get();
        return view('admin.products',compact('products'));
    }
    //view category
    public function view_cats(){
        $cats = Pro_cat::all();
        return view('admin.categories',compact('cats'));
    }
    //add category
    public function add_cat(){
        return view('admin.addCat');
    }
    //add category
    public function catForm(Request $request){
        $pro_cat = new Pro_cat;
        $pro_cat->name = $request->cat_name;
        $pro_cat->status = '0';        
        $pro_cat->save();

        $cats = Pro_cat::all();
        return view('admin.categories',compact('cats'));
    }

    //edit category
    public function CatEditForm(Request $request){
        $catid = $request->id;
        $cats = Pro_cat::all()->where('id', $catid);

        return view('admin.CatEditForm',compact('cats'));
    }
    //update query to edit category
    public function editCat(Request $request){
       $catid = $request->id;
       $catname = $request->cat_name;
       $catstatus = $request->status;
        DB::table('pro_cat')->where('id', $catid)->update([
            'name' => $catname,
            'status' => $catstatus
        ]);

        //getting data before redirect
        $cats = Pro_cat::all();
        return view('admin.categories',compact('cats'));
    }
    //update image
    public function ImageEditForm($id){
        $products = Product::all()->where('id', $id); //fetching image

        return view('admin.ImageEditForm',compact('products'));
    }

    public function editProImage(Request $request){
        $proid = $request->id;
        $file = $request->file('new_image');
        $filename = time() . '.' . $file->getClientOriginalName();
        $path = 'upload/images';

        $img = Image::make($file->getRealPath());

        $file->move($path, $filename);

        DB::table('products')->where('id',$proid)->update(['pro_img' => $filename]);

        $products = Product::all();
        return view('admin.products',compact('products'));
    }   

    //update 360 images
    public function ThreeSixtyImageEditForm($id){
        $products = DB::table('pro_images')->where('id', $id)->get(); //fetching image

        return view('admin.ThreeSixtyImageEditForm',compact('products'));
    }

    public function editThreeSixtyImage(Request $request){
        $proid = $request->id;
        $file = $request->file('new_image');
        $filename = time() . '.' . $file->getClientOriginalName();
        $path = 'images/pro_images';

        $img = Image::make($file->getRealPath());

        $file->move($path, $filename);

        DB::table('pro_images')->where('id',$proid)->update(['pro_img' => $filename]);

         // $proImages =  DB::table('pro_images')->get();
        return back();
        
    } 

    //update alt images
    public function AltImageEditForm($id){
        $products = DB::table('alt_images')->where('id', $id)->get(); //fetching image

        return view('admin.AltImageEditForm',compact('products'));
    }

    public function editAltImage(Request $request){
        $proid = $request->id;
        $file = $request->file('new_image');
        $filename = time() . '.' . $file->getClientOriginalName();
        $path = 'images/alt_images';

        $img = Image::make($file->getRealPath());

        $file->move($path, $filename);

        DB::table('alt_images')->where('id',$proid)->update(['alt_img' => $filename]);

         // $proImages =  DB::table('pro_images')->get();
        return back();
        
    }

    //delete category
    public function deleteCat(Request $request){
        $delid = $request->id;
        DB::table('pro_cat')->where('id', '=', $delid)->delete();

        $cats = DB::table('pro_cat')->get();
        return view('admin.categories',compact('cats'));
    }
    //delete product
    public function deletePro(Request $request){
        $delid = $request->id;
        DB::table('products')->where('id', '=', $delid)->delete();

        $products = Product::all();
        return view('admin.products',compact('products'));
    }

    // add alternative image
    public function addAlt($id){
      $proInfo = DB::table('products')->where('id', $id)->get();
      return view('admin.addAlt', compact('proInfo'));
    }

    public function submitAlt(Request $request){
     $file = $request->file('image');
      $filename  = time() . $file->getClientOriginalName(); // name of file

      $path = "images/alt_images";
      $file->move($path,$filename); // save to our local folder
      $proId = $request->pro_id;
      $add_lat = DB::table('alt_images')
                        ->insert(['proId' => $proId, 'alt_img' => $filename, 'status' =>0]);
      return back();
    }

    // add product image for 360 view
    public function addPro_img($id){
      $proInfo = DB::table('products')->where('id', $id)->get();
      return view('admin.addPro_img', compact('proInfo'));
    }

    public function submitPro_img(Request $request){
     $file = $request->file('image');
      $filename  = time() . $file->getClientOriginalName(); // name of file

      $path = "images/pro_images";
      $file->move($path,$filename); // save to our local folder
      $proId = $request->pro_id;
      $add_lat = DB::table('pro_images')
                        ->insert(['proId' => $proId, 'pro_img' => $filename, 'status' =>0]);
      return back();
    }
}
