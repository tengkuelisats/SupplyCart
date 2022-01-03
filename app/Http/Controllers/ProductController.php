<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index()
    {

        $product = Product::select('products.id','products.name','products.price','brands.brand','categories.category')
        ->leftjoin('brands','brands.id','=','products.brand_id')
        ->leftjoin('categories','categories.id','=','products.category_id')
        ->get();
        // dd($product);
        return view('product')->with('product',$product);
    }

    public function indexFilter($filter)
    {
        // dd($filter);

        if($filter == 'fashion'){
            $product = Product::select('products.id','products.name','products.price','brands.brand','categories.category')
            ->leftjoin('brands','brands.id','=','products.brand_id')
            ->leftjoin('categories','categories.id','=','products.category_id')
            ->where('categories.category',$filter)
            ->get();
        }else
        if($filter == 'perfume'){
            $product = Product::select('products.id','products.name','products.price','brands.brand','categories.category')
            ->leftjoin('brands','brands.id','=','products.brand_id')
            ->leftjoin('categories','categories.id','=','products.category_id')
            ->where('categories.category',$filter)
            ->get();
        }elseif($filter == 'catfood'){
            $product = Product::select('products.id','products.name','products.price','brands.brand','categories.category')
            ->leftjoin('brands','brands.id','=','products.brand_id')
            ->leftjoin('categories','categories.id','=','products.category_id')
            ->where('categories.category','Cat Food')
            ->get();
        }
        elseif($filter == 'candles'){
            $product = Product::select('products.id','products.name','products.price','brands.brand','categories.category')
            ->leftjoin('brands','brands.id','=','products.brand_id')
            ->leftjoin('categories','categories.id','=','products.category_id')
            ->where('categories.category',$filter)
            ->get();
        }
        elseif($filter == 'bbw'){
            $product = Product::select('products.id','products.name','products.price','brands.brand','categories.category')
            ->leftjoin('brands','brands.id','=','products.brand_id')
            ->leftjoin('categories','categories.id','=','products.category_id')
            ->where('brands.brand','Bath & Body Works')
            ->get();
        }
        elseif($filter == 'nenahijab'){
            $product = Product::select('products.id','products.name','products.price','brands.brand','categories.category')
            ->leftjoin('brands','brands.id','=','products.brand_id')
            ->leftjoin('categories','categories.id','=','products.category_id')
            ->where('brands.brand','Nena Hijabs')
            ->get();
        }
        elseif($filter == 'royalcanin'){
            $product = Product::select('products.id','products.name','products.price','brands.brand','categories.category')
            ->leftjoin('brands','brands.id','=','products.brand_id')
            ->leftjoin('categories','categories.id','=','products.category_id')
            ->where('brands.brand','Royal Canin')
            ->get();
        }
        elseif($filter == 'powercat'){
            $product = Product::select('products.id','products.name','products.price','brands.brand','categories.category')
            ->leftjoin('brands','brands.id','=','products.brand_id')
            ->leftjoin('categories','categories.id','=','products.category_id')
            ->where('brands.brand','Power Cat')
            ->get();
        }

        // dd($product);
        return view('product')->with('product',$product);
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        // dd($product);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "brand" => $product->brand,
                "quantity" => 1,
                "category" => $product->category,
                "price" => $product->price
            ];
        }

        session()->put('cart', $cart);
        session()->flash('success', 'Product added to cart successfully!');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function cart()
    {
        return view('cart');
    }

    public function remove(Request $request)
    {
        // dd($request);
        if($request->product_id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->product_id])) {
                unset($cart[$request->product_id]);
                session()->put('cart', $cart);
            }

        }
        return redirect()->back();
    }


}
