@extends('frontend.layout.app')
@section('content')
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

    <section class="cat_product_area section_gap">
        <div class="container-fluid">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <div class="latest_product_inner row">
                        <div class="card mt-lg-5">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <th> Order Id </th>
                                <th> User </th>
                                <th> Product </th>
                                {{--<th> Quantity</th>--}}
                                <th> Total Price</th>
                                <th> Order Date</th>
                                {{--<th> Status</th>--}}
                                {{--<th> Action </th>--}}
                                </thead>

                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td> {{ $order->id }} </td>
                                        <td> {{ $order->user->name }} </td>
                                        {{--<td> {{ $order->products['name'] }} </td>--}}
                                        <td>
                                            @foreach ($order->order_items as $order_item)
                                                <li>{{$order_item->product['name']}}(Qty:-{{$order_item->quantity}})</li>
                                            @endforeach
                                        </td>
                                        <td> {{ $order->total_price}} </td>
                                        <td> {{ $order->created_at }} </td>
                                        {{--<td>--}}
                                            {{--<a href="{{ route('student.edit', $student->id )}}" class="badge badge-success"> Edit </a>--}}
                                            {{--<form action="{{ route('order.destroy', $order->id)}}" method="post">--}}
                                                {{--@csrf--}}
                                                {{--@method('DELETE')--}}
                                                {{--<button class="badge btn-danger" type="submit"> Delete </button>--}}
                                            {{--</form>--}}
                                        {{--</td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets cat_widgets">
                            <div class="l_w_title">
                                <h3>PROFILE DETAILS</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">

                                    <li><a href="{{route('change-password')}}">Change Password</a>
                                    </li>
                                    <li><a href="{{route('myorder')}}">My Order</a>
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