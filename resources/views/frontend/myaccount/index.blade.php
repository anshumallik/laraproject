@extends('frontend.layout.app')
@section('content')
    @push('css')
        <style>
            .card {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                max-width: 300px;
                margin: auto;
                text-align: center;
                max-height: 1000px;
                color: #0c525d;

            }

            .title {
                color: grey;
                font-size: 18px;
                color: black;

            }

            button {
                border: none;
                outline: 0;
                display: inline-block;
                padding: 8px;
                color: white;
                background-color: #000;
                text-align: center;
                cursor: pointer;
                width: 100%;
                font-size: 18px;
            }

            a {
                text-decoration: none;
                font-size: 22px;
                color: black;
            }

            button:hover, a:hover {
                opacity: 0.7;
            }



        </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush
    <!--================Home Banner Area =================-->
    <section class="banner_area" style="background: url('{{asset('img/banner/banner-bg.jpg')}}')">
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
    <!--================End Home Banner Area =================-->
    <section class="cat_product_area section_gap">
        <div class="container-fluid">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <div class="latest_product_inner row">
                        <div class="card mt-lg-5">
                            <h1 class="card-title mt-10">Account Details</h1>
                            <p class="title">Name: <span>{{ Auth::user()->name }}</span></p>
                            <p class="title" >Email:<span>{{ Auth::user()->email }}</span></p>
                            <p class="title">Address:<span>{{Auth::user()->address}}</span></p>
                            <a href="{{route('myaccount.edit', Auth::user()->id)}}"><button type="submit" class="btn btn-primary">Edit</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets cat_widgets">
                            <div class="l_w_title" style="background-color: darkgoldenrod">
                                <h3>PROFILE DETAILS</h3>
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
    <div class="container-fluid mt-lg-5">

    </div>
    @endsection