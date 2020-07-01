@extends('frontend.layout.app')
@section('title', 'Cart Page')

@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area" style="background: url('{{asset('img/banner/banner-bg.jpg')}}')">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Shopping Cart</h2>
                    <div class="page_link">
                        <a href="index.html">Home</a>
                        <a href="cart.html">Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->
    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                @if($cart)
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Product</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Remove</th>
                                <th scope="col">Price</th>
                                <th scope="col">Total</th>
                            </tr>
                            </thead>

                            @foreach($cart->items as $product)
                                <tbody>
                                <tr>
                                    <td>
                                        <img src="{{ asset('images/product/'. $product['image']) }}" alt="" width="100"
                                             height="100">
                                    </td>
                                    <td>
                                        <div class="media-body">
                                            <p>{{ $product['name'] }}</p>
                                        </div>
                                    </td>
                                    <td>

                                        <form action="{{ route('cart.update', $product['id']) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="text" name="qty" value="{{$product['qty']}}">
                                            <button type="submit" class="btn btn-primary btn-sm"><i
                                                        class="fa fa-refresh"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{route('cart.remove', $product['id'])}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm ml-4"><i
                                                        class="fa fa-trash-o"></i></button>
                                        </form>
                                    </td>


                                    <td>
                                        <h5>Rs. {{ $product['price'] }}</h5>
                                    </td>
                                    <td>Rs. {{$product['qty']}} * {{ $product['price'] }}</td>

                                </tr>
                                @endforeach
                                <tr>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <h5>Subtotal</h5>
                                    </td>
                                    <td></td>
                                    <td>
                                        <h5>Rs. {{$cart->totalPrice}}</h5>
                                    </td>
                                </tr>

                                <tr class="out_button_area">
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <div class="checkout_btn_inner">
                                            @if(Auth::guest())
                                                <a class="gray_btn" href="{{ route('frontend.category', $id ?? '') }}">Continue
                                                    Shopping</a>
                                            @else
                                                <a class="gray_btn" href="{{ route('frontend.category', $id ?? '') }}">Continue
                                                    Shopping</a>
                                                <form action="{{ route('order.add') }}" class="main_btn" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="cart_data"
                                                           value="{{  json_encode($cart->items) }}">
                                                    <input type="hidden" name="cart_total"
                                                           value="{{$cart->totalPrice}}">
                                                    <button type="submit" class="btn btn-primary">Checkout</button>

                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                        </table>
                    </div>
            </div>
            @else
                <h3 class="text-center">There is no item in cart.</h3>
            @endif
        </div>
    </section>
    <!--================End Cart Area =================-->
@endsection