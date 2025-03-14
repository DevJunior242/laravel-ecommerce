<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if ($usertype == '1') {
            return view('admin.home');
        }

       
        $user = auth()->user();
        $products = Product::latest()->paginate(60);
        $carts = Cart::where('email',$user->email)->get();
        return view('home.user', compact('products', 'carts'));

    }
    public function index(Request $request)
    {
        if ($request->has("query")){
            $query = $request->query("query");
            $products = Product::where('title', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->paginate(50);
        }else{
            $products = Product::latest()->paginate(60);
        }

        if (Auth::check()) {
            $user = auth()->user();
            $carts = Cart::where('email',$user->email)->get();
       
        return view('home.user', compact('products', 'carts'));
    }
    

    return view('home.user', compact('products'));
    }
    public function details($id)

    {
        $product = Product::find($id);
        return view('home.details', compact('product'));
    }

    public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = auth()->user();

            $product = Product::find($id);

            $request->validate([
                'quantity' => 'required|numeric'
            ]);

            $cart = new Cart();

            $cart->user_id = $user->id;

            $productPrice = $product->discount_price ?? $product->price;
            $cart->price = $request->quantity * $productPrice;



            $cart->name = $user->name;
            $cart->image = $product->image_path;
            $cart->product_id = $product->id;
            $cart->product_title = $product->title;
            $cart->quantity = $request->quantity;
            $cart->email = $user->email;
            $cart->phone = $user->phone;

            $cart->save();

            return back();
        }
        return to_route('login');
    }

    public function cart()
    {

        return view('home.header');
    }

    

}
