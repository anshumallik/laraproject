@extends('frontend.layout.app')
@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area" style="background: url({{asset('img/banner/banner-bg.jpg')}})">
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

    <div class="content-wrapper mt-5" >
        <form action="{{ route('myaccount.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
            {{csrf_field() }}
            @method('PATCH')
            <div class="row">
                <div class="col-xl-8 p-4 m-auto shadow">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title text-info"> Edit Details</h5>
                        </div>
                        <div class="card-body">

                            {{--  print success message  --}}
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                    @php
                                        Session::forget('success');
                                    @endphp
                                </div>
                            @endif


                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
                                    <div class="form-group" {{ $errors->has('name') ? 'has-error' : ''}}>
                                        <label>  Name </label>
                                        <input type="text" name="name"  class="form-control" value="{{Auth::user()->name}}">
                                        {!! $errors->first('name', '<small class="text-danger">:message</small>') !!}
                                    </div>
                                    <div class="form-group" {{ $errors->has('name') ? 'has-error' : ''}}>
                                        <label> First Name </label>
                                        <input type="text" name="first_name"  class="form-control" value="{{Auth::user()->first_name}}">
                                        {!! $errors->first('first_name', '<small class="text-danger">:message</small>') !!}
                                    </div>
                                    <div class="form-group" {{ $errors->has('name') ? 'has-error' : ''}}>
                                        <label>   Last Name </label>
                                        <input type="text" name="last_name"  class="form-control" value="{{Auth::user()->last_name}}">
                                        {!! $errors->first('last_name', '<small class="text-danger">:message</small>') !!}
                                    </div>


                                    <div class="form-group" {{ $errors->has('address') ? 'has-error' : ''}}>
                                        <label>  Address </label>
                                        <input type="text" name="address"  class="form-control" value="{{Auth::user()->address}}">
                                        {!! $errors->first('adress', '<small class="text-danger">:message</small>') !!}
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success" name="submit"> Update </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection