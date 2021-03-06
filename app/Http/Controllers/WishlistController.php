<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
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
        $users =Auth::user();
//        dd($user);
        $wishlists = Wishlist::where("user_id", "=",$users->id)->orderby('id','desc')->paginate(10);
        return view('frontend.wishlist',compact('users','wishlists'));
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
        $this->validate($request, array(
            'user_id'=>'required',
            'product_id' =>'required',
        ));


        $status=Wishlist::where('user_id', Auth::user()->id)
            ->where('product_id',$request->product_id)
            ->first();

        if(isset($status->user_id) and isset($request->product_id))
        {
            return redirect()->route('wishlist.index')->with('anshu', 'This item is already in your wishlist!');
        }
        else
        {
            $wishlist = new Wishlist();

            $wishlist->user_id = $request->user_id;
            $wishlist->product_id = $request->product_id;
            $wishlist->save();
//            dd($wishlist);

            return redirect()->route('wishlist.index')->with('flash_message',
                'Item, '. $wishlist->product->name.' Added to your wishlist.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wishlist=Wishlist::findOrFail($id);
        $wishlist->delete();

        return redirect()->route('wishlist.index')
            ->with('anshu','Item successfully deleted');

    }
}
