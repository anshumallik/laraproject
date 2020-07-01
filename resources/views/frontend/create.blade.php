@extends('layouts.admin.app')

@section('title', 'Product')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 offset-sm-1 mt-3">
                    <h1 class="display-4">Add Category</h1>


                </div>

            </div>

            @if($errors->any())
                <div class="alert alert-danger">
                    <strong>Oops!</strong> There were some problems with your input.<br/><br/>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>
            @endif

            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row ml-lg-5">
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="form-group">
                            <strong>Product Name:</strong>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Product Name">
                            @if ($errors->has('name'))
                                <p class="error alert alert-danger">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="form-group">
                            <label for="categories">Select Category:</label>
                            <select name="categories" id="categories" class="form-control">
                                <option value="">---Select Category ---</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('categories'))
                                <p class="error alert alert-danger">{{ $errors->first('categories') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="form-group">
                            <strong>Price:</strong>
                            <input type="text" name="price" class="form-control" placeholder="Price">
                            @if ($errors->has('price'))
                                <p class="error alert alert-danger">{{ $errors->first('price') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="form-group">
                            <strong>Product Code:</strong>
                            <input type="text" name="product_code" class="form-control" placeholder="Product Code">
                            @if ($errors->has('product_code'))
                                <p class="error alert alert-danger">{{ $errors->first('product_code') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="form-group">
                            <strong>Quantity:</strong>
                            <input type="text" name="quantity" class="form-control" placeholder="Quantity">
                            @if ($errors->has('quantity'))
                                <p class="error alert alert-danger">{{ $errors->first('quantity') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="form-group">
                            <strong>Description:</strong>
                            <textarea name="description" id="description" cols="100" rows="5" placeholder=""></textarea>
                            @if ($errors->has('description'))
                                <p class="error alert alert-danger">{{ $errors->first('description') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="form-group">
                            <label for="image">Choose Image</label>
                            <input type="file" class="form-control-file" name="image">
                            @if ($errors->has('image'))
                                <p class="error alert-danger">{{ $errors->first('image') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <a style="margin: 20px;" href="{{ route('products.index')}}" class="btn btn-primary">Back</a>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>

                </div>

            </form>
        </div>
    </div>

@endsection