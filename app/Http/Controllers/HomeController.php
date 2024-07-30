<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $user = User::where('usertype','user')->get()->count();
        $product = Product:: all()->count();
        $order = Order::all()->count();
        $delivered = Order::where('status','Delivered')->count();
        return view('admin.index',compact('user','product','order','delivered'));
    }

    public function home(){
        $product = Product::all();
        return view('home.index',compact('product'));
    }

    public function login_home()
    {
        $product = Product::all();
        $user = Auth::user();
        $user_id = $user->id;
        $count= Cart::where('user_id', $user_id)->count();

        return view('home.index',compact('product','count'));
    }

    public function product_details($id){

        $product = Product::find($id);
        return view('home.product_details',compact('product'));
    }

    public function add_to_cart($id){
        $product = Product::find($id);
        $user = Auth:: user();

        $user_id = $user->id;

        $data = new Cart;

        $data->user_id = $user_id;
        $data->product_id = $product->id;
        $data->save();
        toastr()
        ->timeOut(1000)
        ->closeButton()
        ->success('Product added to cart successfully.');
        return redirect()->back();

    }

    public function mycart(){
        $product = Product::all();
        $user = Auth::user();
        $user_id = $user->id;
        $count= Cart::where('user_id', $user_id)->count();
        $cart = Cart::where('user_id', $user_id)->get();

        return view('home.mycart',compact('cart','count'));
    }

    public function remove_from_cart($id){
        Cart::where('id', $id)->delete();
        toastr()
        ->timeOut(1000)
        ->closeButton()
        ->success('Product Removed from the cart successfully.');
        return redirect()->back();
    }

    public function confirm_order(Request $request)
    {
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;

        $user_id = Auth::user()->id;
         $cart = Cart::where('user_id', $user_id)->get();

         foreach ($cart as $carts) {
             $order = new Order();
             $order->user_id = $user_id;
             $order->product_id = $carts->product_id;
             $order->name = $name;
             $order->rec_address = $address;
             $order->phone = $phone;
             $order->save();
         }
          $cart_remove = Cart::where('user_id', $user_id)->get();

         foreach($cart_remove as $remove)
         {
            $data = Cart::find($remove->id);
            $data->delete();
         }
         toastr()
         ->timeOut(1000)
         ->closeButton()
         ->success('Product ordered successfully.');
         return redirect()->back();
    }
    public function myorders(){
        $user = Auth::user();
        $user_id = $user->id;
        $orders = Order::where('user_id', $user_id)->get();
        $count = Cart::where('user_id', $user_id)->get()->count();
        return view('home.order',compact('count','orders'));
    }
}
