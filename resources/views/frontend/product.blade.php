@extends('frontend.layout.app')
@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area" style="background: url('{{asset("img/banner/banner-bg.jpg")}}');">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Single Product Page</h2>
                    <div class="page_link">
                        <a href="index.html">Home</a>
                        <a href="category.html">Category</a>
                        <a href="single-product.html">Product Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->
    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="s_product_img">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" style="width: 40px; height: 600px;"
                                     src="{{asset('images/product/'.$product->image)}}" alt="Third slide">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3>{{$product->name}}</h3>
                        <h2>Rs{{$product->price}}</h2>
                        <ul class="list">
                            <li>
                                <a class="active" href="#">
                                    <span>Category</span> : Household</a>
                            </li>
                            @if($product->quantity === 0 )
                                <li>
                                    <span>Not Available: Out of stock</span>
                                </li>
                            @else
                                <li>
                                    <a href="#">
                                        <span>Availibility</span> : {{ $product->quantity }}</a>
                                </li>
                        </ul>
                        <p>{{ $product->description }}</p>
                        <div class="product_count">
                            <label for="qty">Quantity:</label>
                            <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:"
                                   class="input-text qty">
                            <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                    class="increase items-count" type="button">
                                <i class="lnr lnr-chevron-up"></i>
                            </button>
                            <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                    class="reduced items-count" type="button">
                                <i class="lnr lnr-chevron-down"></i>
                            </button>
                        </div>
                        <div class="card_area">
                            <a class="main_btn" href="{{route('cart.add', $product->id)}}">Add to Cart</a>

                            @guest
                            @else
                                <form action="{{route('wishlist.store')}}" id="contact_form" method="post">
                                    {{csrf_field()}}
                                    <input name="user_id" type="hidden" value="{{Auth::user()->id}}"/>
                                    <input name="product_id" type="hidden" value="{{$product->id}}"/>
                                    <button type="submit" name="submit" class="btn btn-primary btn-lg"><a
                                                class="icon_btn"
                                                href="#">
                                            <i class="lnr lnr lnr-heart"></i>
                                        </a></button>

                                </form>
                            @endguest

                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->
@endsection