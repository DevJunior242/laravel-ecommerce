<?php

namespace App\Http\Controllers;
use PDF;
use Hashids;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function view_category()
    {

        $categories = Category::all();

        return view('admin.category', compact('categories'));
    }

    public function add_category(Request $request)
    {

        $request->validate([
            'name' => 'required|string'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return back()->with('success', 'category add successfully');
    }

    public function delete_category($id)
    {
        $category = Category::find($id);

        $category->delete();

        return back()->with('success', 'category delete successfully');
    }

    public function view_product()
    {
        $categories = Category::all();
        return view('admin.product', compact('categories'));
    }

    public function add_product(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'discount_price' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,svg|max:2048'
        ]);
        $product = new Product();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagepath = $image->store('images', 'public');
            $product->image_path = $imagepath;
        }



        $product->title = $request->title;
        $product->category_id = $request->category_id;
        $product->Description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;

        $product->save();
        return back()->with('success', 'category delete successfully');
    }

    public function show_product()
    {
        $products = Product::all();
        return view('admin.show', compact('products'));
    }

    public function edit_view(Product $product)
    {
        $categories = Category::all();
        return view('admin.edit_view', compact('product', 'categories'));
    }


    public function update_product(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'discount_price' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,svg|max:2048'
        ]);
        $product = Product::find($id);

        $product->title = $request->title;
        $product->category_id = $request->category_id;
        $product->Description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagepath = $image->store('images', 'public');
            $product->image_path = $imagepath;
        }

        $product->update();
        return back()->with('success', 'product update successfully');
    }

    public function delete_product($id)
    {
        $product = Product::find($id);
        $product->delete();
        return back()->with('success', 'product delete successfully');
    }


    public function show_cart()
    {
        if (Auth::check()) {
            $userRole = auth()->user()->usertype;
            if ($userRole == '1') {
                $carts = Cart::all();
            } else {
                $carts = Cart::where('user_id', auth()->user()->id)->get();
            }

            if ($carts->count() > 0) {
                return view('admin.show_cart', compact('carts'));
            } else {
                return back();
            }
        }


        return to_route('login');
    }


    public function home_cart()
    {
        if (Auth::check()) {
            $user = auth()->user();
            $carts = Cart::where('email', $user->email)->get();

            return view('home.header', compact('carts'));
        }
        return to_route('login');
    }



    public function delete_cart($hashid, $connection ='main')
    {
        if (!Auth::check()) {
            return to_route('login');

        }

        $decodedId = Hashids::connection($connection)->decode($hashid);
        if(!$decodedId){
            return back()->with('error', 'l\'id du panier est invalide');  
        }
        // if(!is_numeric($id)){
        //     return back()->with('error', 'l\'id du panier est invalide');
        // }
            $user = auth()->user()->id;

            $userRole = auth()->user()->usertype;
            if ($userRole == '1') {
                $cart = Cart::find($decodedId[0]);
            } else {
                $cart = Cart::where('id', $decodedId[0])->where('user_id', $user)->first();
            }

            if (!$cart) {
                return back()->with('error', 'cart not found');
            } else {

                $cart->delete();
                return redirect('/')->with('success', 'cart deleted successfully');
            }
        
       
    }

    public function cash_order()
    {
        if (Auth::check()) {
            $user = auth()->user()->id;
            $carts = Cart::where('user_id', $user)->get();

            foreach ($carts as $cart) {
                $order = new Order();
                $order->name = $cart->name;
                $order->email = $cart->email;
                $order->quantity = $cart->quantity;
                $order->address = $cart->address;
                $order->user_id = $cart->user_id;
                $order->price = $cart->price;
                $order->image = $cart->image;
                $order->product_id = $cart->product_id;
                $order->product_title = $cart->product_title;


                $order->payment_status = 'processing';
                $order->delivery_status = 'processing';

                $order->save();

                $cart = Cart::find($cart->id);
                $cart->delete();
            }
            return back();
        }
    }

    public function order()
    {



        $userRole = auth()->user()->usertype;
        if ($userRole == '1') {
            $orders = Order::all();
        } else {
            $orders = Order::where('user_id', auth()->user()->id)->get();
        }
        return view('admin.order', compact('orders'));
    }



    public function delivered($id)
    {

        $user = auth()->user()->id;
        $userRole = auth()->user()->usertype;
        if ($userRole == '1') {
            $order = Order::find($id);
        } else {
            $order = Order::where('id', $id)
                ->where('user_id', $user)->first();
        }

        if (!$order) {
            abort(404);
        } else {
            $order->delivery_status = 'delivered';
            $order->payment_status = 'paid';

            $order->save();

            return redirect()->back();
        }
    }

    public function pdf($id)
    {



        $order = Order::find($id);
        $pdf = PDF::loadView('admin.pdf', compact('order'));

        return $pdf->download('orders_details.pdf');
    }
}
