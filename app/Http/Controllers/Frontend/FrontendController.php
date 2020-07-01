<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
  public function index(){
      $products=Product::all();
      return view('frontend.index',compact('products'));
  }

  public function product_detail($id=null)
  {
      $product =Product::find($id);
      return view('frontend.product',compact('product'));
  }
  public function category($id = null)
  {
      $categories=Category::all();
      if(is_null($id)){
        $products = Product::all();
      }else{
          $products = Category::find($id)->products;
      }

      return view('frontend.category',compact('categories', 'products'));
  }


  public function checkout()
  {
      return view('frontend.checkout');
  }

}
