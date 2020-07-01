<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\Category;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use function Sodium\add;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));

    }

    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldcart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldcart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('frontend.cart');
    }


    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif|image',
            'description' => 'required',
            'quantity' => 'required',
            'product_code' => 'required',
            'categories' => 'required',
        ]);
        $image = $request->file('image');
        if (isset($image)) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            if (!file_exists('images/product')) {
                mkdir('images/product', 0077, true);
            }
            $image->move('images/product', $imageName);
        }
        $products = $request->except('image');
        $products['image'] = $imageName;
        $products['category_id'] = $request->categories;
        Product::create($products);
        return redirect()->route('product.index');
    }


    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('product.update', compact('categories', 'product'));
    }


    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,gif,jpg',
            'description' => 'required',
            'quantity' => 'required',
            'product_code' => 'required',
            'categories' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $productImage = public_path('images/product' . $product->image);
            if (File::exists($productImage)) {
                unlink($productImage);
            }
        }

        $input = $request->except('image');
        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('images/product'), $imageName);
        $input['image'] = $imageName;
        $input['categories_id'] = $request->categories;
        $product->update($input);
        return redirect()->route('product.index')->with('success', 'Record updated successfully');


    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }

    public function viewOrdersCharts()
    {
        return view('admin.view_orders_charts');
    }
}
