<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;
use App\Order;

class Order extends Model
{
    protected $fillable = ['total','status'];
    protected $table = 'orders';
    

    public function orderFields() {
        return $this->belongsToMany(Product::class)->withPivot('qty', 'total');
    }

    public static function createOrder() {

        // for order inserting to database

        $user = Auth::user();
        $order = $user->order()->create(['total' => Cart::total(), 'status' => 'pending']);


        $cartItems = Cart::content();
        foreach ($cartItems as $cartItem) {
            $order->orderFields()->attach($cartItem->id, ['qty' => $cartItem->qty, 'tax' => Cart::tax(), 'total' => $cartItem->qty * $cartItem->price]);
        }
    }
}
