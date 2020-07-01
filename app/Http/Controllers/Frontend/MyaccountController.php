<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class MyaccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Auth::user();
        return view('frontend.myaccount.index', compact('users'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'current_password' =>['required', new MatchOldPassword()],
            'new_password'=>['required'],
            'new_confirm_password'=>['same:new_password'],
        ]);
            User::find(auth()->user()->id)->update(['password'=>Hash::make($request->new_password)]);
            Auth::logout();
            Session::flush();
            return redirect()->route('login');

    }

    public function changePassword()
    {
        return view('frontend.myaccount.changePassword');
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('frontend.myaccount.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'first_name'=>'required',
            'last_name'=>'required',
            'name'=>'required',
//            'email'=>'required|email|unique:users',
//            'password'=>'required|min:6|confirmed',
            'address'=>'required',
            ]);
        $user =User::find($id);
        $user->name = $request->name;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
//        $user->email = request('email');
//        $user->password = bcrypt(request('password'));
        $user->address = $request->address;
//        $user->phone=$request->phone;

        $user->save();
        return redirect()->route('myaccount.index');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function myOrder(){
        $user = Auth::user();
        $orders=$user->orders;
//        dd($user->orders);
        return view('frontend.myaccount.userOrders',compact('orders'));

    }
}
