<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Order;
use App\OrderItem;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function users()
    {
        $userChartData = User::select([
            DB::raw('DATE(created_at) AS date'),
            DB::raw('COUNT(id) AS count')
        ])
            ->whereBetween('created_at', [Carbon::now()->subDays(30), Carbon::now()])
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get()
            ->toArray();
        $users = User::all();
        return view('users.index', compact('users', 'userChartData'));
    }
    public function index()
    {
        $orderItemChartData = OrderItem::select([
            DB::raw('WEEK(created_at) AS week'),
            DB::raw('SUM(quantity) AS count')
        ])
            ->whereBetween('created_at', [Carbon::now()->subWeeks(52), Carbon::now()])
            ->groupBy('week')
            ->orderBy('week', 'ASC')
            ->get()
            ->toArray();
        return view('admin/admin', compact('orderItemChartData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Responsne
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
       $user->delete();
       return redirect()->route('users.index');
    }


}
