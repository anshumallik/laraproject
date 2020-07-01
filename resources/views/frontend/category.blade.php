@extends('frontend.layout.app')
@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area" style="background: url('{{ asset("img/banner/banner-bg.jpg") }}');">
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

    <!--================Category Product Area =================-->
<section class="cat_product_area section_gap">
    <div class="container-fluid">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                <div class="latest_product_inner row">
                    @foreach($products as $product)
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="f_p_item" id="{{$product->category->slug}}">
                            <div class="f_p_img">
                                <img class="img-fluid" src="{{asset('images/product/'.$product->image)}}" alt="">
                                <div class="p_icon">
                                    <a href="#">
                                        <i class="lnr lnr-heart"></i>
                                    </a>
                                    <a href="#">
                                        <i class="lnr lnr-cart"></i>
                                    </a>
                                </div>
                            </div>
                            <a href="#">
                                <h4>{{$product->name}}</h4>
                            </a>
                            <h5>Rs. {{$product->price}}</h5>
                            <a href="{{ route('frontend.product',$product->id ) }}"><button type="button" class="btn btn-primary">Add to Cart</button></a>

                        </div>
                    </div>
                        @endforeach
                </div>
            </div>
            <div class="col-lg-3">
                <div class="left_sidebar_area">
                    <aside class="left_widgets cat_widgets">
                        <div class="l_w_title">
                            <h3>Browse Categories</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">

                                @foreach($categories as $category)
                                    <li data-filter="#{{$category->slug}}"><a href="{{route('frontend.category',$category->id)}}">{{$category->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        {{--<a href="{{ route('frontend.product',$product->id ) }}"><button type="button" class="btn btn-primary">Add to Cart</button></a>--}}
                    </aside>
                </div>
            </div>
        </div>

    </div>
</section>
<!--================End Category Product Area =================-->
@endsection