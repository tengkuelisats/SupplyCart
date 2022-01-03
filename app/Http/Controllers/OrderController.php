<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function checkout(Request $request){

        $cart = session()->get('cart');

        if($cart == null){
            $request->session()->flash('errorMsg', 'cart cannot be empty');
            return redirect()->back()->with('errorMsg','cart cannot be empty');
        }else{
            $order = Order::create([
                'user_id' => Auth::user()->id,
                'order' => serialize(session()->get('cart')),
                'total' => $request->total,
            ]);

            // dd($order);
            $request->session()->forget('cart');
            $request->session()->flash('success', 'Order Received. Your Order ID is ' . $order->id);
            $product = Product::all();
            return redirect('/product')->with('product',$product);
        }


    }

    public function orderHistoryIndex(){

        $order = Order::where('user_id', Auth::user()->id)->get();
        return view('/orderHistory')->with('order', $order);
    }

    public function orderHistory(Request $request){

        $order = Order::where('id', $request->orderid)->get()->first();
        $list = unserialize($order->order);
        // dd($order);

        return view('orderHistoryView')
        ->with('list', $list)
        ->with('order', $order);
    }
}
