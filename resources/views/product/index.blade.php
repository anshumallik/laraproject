@extends('layouts.layout')
@section('title','Product Page')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('product.create') }}" class="btn btn-info float-right"><i class="fas fa-plus-circle"></i> Add Product </a>
            </div>
        </div>

        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <th> Name </th>
            <th> Category </th>
            <th> Price </th>
            <th> Image </th>
            <th> Product_code </th>
            <th> Quantity </th>
            <th> Action </th>
            </thead>

            <tbody>
            @foreach($products as $product)
                <tr>
                    <td> {{ $product->name }} </td>
                    <td> {{ $product->category->name }} </td>
                    <td> {{ $product->price }} </td>
                    <td><img src="{{asset('images/product/'.$product->image)}}" alt="" width="100"> </td>
                    <td> {{ $product->product_code}} </td>
                    <td> {{ $product->quantity }} </td>
                    <td><a href="{{ route('product.edit', $product->id )}}" class="badge badge-success"> Edit </a>
                        <form action="{{ route('product.destroy', $product->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="badge btn-danger" type="submit"> Delete </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection