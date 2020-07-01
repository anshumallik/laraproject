@extends('frontend.layout.app')
@section('content')
    <section class="banner_area" style="background: url('{{ asset("img/banner/banner-bg.jpg") }}')">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Shop Category Page</h2>
                    <div class="page_link">
                        <a href="index.html">Home</a>
                        <a href="category.html">Category</a>
                        <a href="category.html">Women Fashion</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cat_product_area section_gap">
        <div class="container-fluid">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <div class="latest_product_inner row">

                        <div class="card mt-lg-5">
                            @if(Session::has('flash_message'))
                                <div class="alert alert-success">
                                    {{ Session::get('flash_message') }}
                                    @php
                                        Session::forget('flash_message');
                                    @endphp
                                </div>
                            @endif
                                @if(Session::has('anshu'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('anshu') }}
                                        @php
                                            Session::forget('anshu');
                                        @endphp
                                    </div>
                                @endif
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <th> Product</th>
                                <th>Action</th>

                                </thead>

                                <tbody>
                                @if(Auth::user()->wishlist->count())
                                    @foreach($wishlists as $wishlist)
                                        <tr>
                                        <td>{{$wishlist->product->name}}</td>
                                            <td>
                                                <form action="{{route('wishlist.destroy',$wishlist->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets cat_widgets">
                            <div class="l_w_title">
                                <h3 style="background-color:darkgoldenrod; text-align: center">PROFILE DETAILS</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">

                                    <li><a href="{{route('change-password')}}">Change Password</a>
                                    </li>
                                    <li><a href="{{route('myorder')}}">My Order</a>
                                    </li>
                                    <li><a href="{{route('wishlist.index')}}">Wishlist</a>
                                    </li>


                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection