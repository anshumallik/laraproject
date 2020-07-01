<?php

namespace App\Http\Controllers;

use App\OrderItem;
use App\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Product;
use Faker\Provider\Address;
use App\Order;
use foo\bar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;


class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function create()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


//        $orderChartData = Order::selectRaw("DATE(orders.created_at) as date, SUM(order_items.quantity) as qty, order_items.product_id as prod_id, products.name as prod_name")
//            ->join("order_items", "orders.id", "order_items.order_id")
//            ->join("products", "order_items.product_id", "products.id")
//            ->groupBy(["date", "prod_id", "prod_name"])
//            ->orderBy('date', 'ASC')
//            ->get()
//            ->toArray();
//        DB::table('orders')->selectRaw()

        $orderChartData = Order::select([
            DB::raw('DATE(orders.created_at) as date'),
            DB::raw('SUM(order_items.quantity) as qty'),
            DB::raw('SUM(orders.total_price) as price'),
            DB::raw('order_items.product_id as prod_id'),
            DB::raw('products.name as prod_name')


        ])
            ->join('order_items', 'orders.id', 'order_items.order_id')
            ->join('products', 'products.id', 'order_items.product_id')
            ->groupBy('date', 'prod_id', 'prod_name', 'price')
            ->orderBy('date', 'ASC')
            ->get()
            ->toArray();

//        dd($orderChartData);
        $users = User::all();
        $orders = Order::all();
        return view('order.index', compact('orders', 'orderChartData', 'users'));
    }


    public function store(Request $request)
    {

    }


    public function show(Order $order)
    {
        //
    }


    public function edit(Order $order)
    {
        //
    }

    public function update(Request $request, Order $order)
    {
        //
    }


    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->back();
    }

}
