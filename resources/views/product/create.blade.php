@extends('layouts.layout')
@section('content')

    <div class="content-wrapper">
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xl-8 p-4 m-auto shadow">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title text-info"> Add Product </h5>
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
                                    <div class="form-group">
                                        <label> Name </label>
                                        <input type="text" name="name" placeholder="Name" class="form-control"
                                               value="{{ old('first_name')}}">
                                        {!! $errors->first('name', '<small class="text-danger">:message</small>') !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="categories"> Category </label>
                                        <select name="categories" id="categories" class="form-control">
                                            <option value="">--Select Category--</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @if( $errors->has('categories'))
                                            <p class="error alert alert-danger">{{ $errors->first('categories') }}</p>
                                        @endif
                                        {{--{!! $errors->first('name', '<small class="text-danger">:message</small>') !!}--}}
                                    </div>
                                    <div class="form-group">
                                        <label>Price:</label>
                                        <input type="text" name="price" placeholder="Price" class="form-control"
                                               value="{{ old('first_name')}}">
                                        @if ($errors->has('price'))
                                            <p class="error alert alert-danger">{{ $errors->first('price') }}</p>
                                        @endif
                                        {{--{!! $errors->first('name', '<small class="text-danger">:message</small>') !!}--}}
                                    </div>
                                        <div class="form-group">
                                            <strong>Description:</strong>
                                            <textarea name="description" id="description" cols="50" rows="5" placeholder=""></textarea>
                                            @if ($errors->has('description'))
                                                <p class="error alert alert-danger">{{ $errors->first('description') }}</p>
                                            @endif
                                        </div>

                                    <div class="form-group">
                                        <label for="image">Choose Image</label>
                                        <input type="file" class="form-control-file" name="image">
                                        @if ($errors->has('image'))
                                            <p class="error alert-danger">{{ $errors->first('image') }}</p>
                                        @endif
                                        {{--{!! $errors->first('name', '<small class="text-danger">:message</small>') !!}--}}
                                    </div>
                                    <div class="form-group">
                                        <strong>Product Code:</strong>
                                        <input type="text" name="product_code" class="form-control" placeholder="Product Code">
                                        @if ($errors->has('product_code'))
                                            <p class="error alert alert-danger">{{ $errors->first('product_code') }}</p>
                                        @endif
                                        {{--{!! $errors->first('name', '<small class="text-danger">:message</small>') !!}--}}
                                    </div>
                                    <div class="form-group">
                                        <strong>Quantity:</strong>
                                        <input type="text" name="quantity" class="form-control" placeholder="Quantity">
                                        @if ($errors->has('quantity'))
                                            <p class="error alert alert-danger">{{ $errors->first('quantity') }}</p>
                                        @endif{{--{!! $errors->first('name', '<small class="text-danger">:message</small>') !!}--}}
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success" name="submit"> Submit</button>
                                        <a href="{{ route('student.index' )}}" class="btn btn-success"> Back </a>
                                        {{--<form action="{{ route('student.index')}}" method="post"></form>--}}
                                    </div>
                                    {{csrf_field()}}
                                </div>
                            </div>
                        </div>
                    </div>
        </form>
    </div>
@endsection