@extends('layouts.layout')
@section('title','Category Page')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('category.create') }}" class="btn btn-info float-right"><i
                            class="fas fa-plus-circle"></i> Add New </a>
            </div>
        </div>

        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th> Name</th>
                <th> Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td> {{ $category->name }} </td>
                    <td><a href="{{ route('category.edit', $category->id )}}" class="badge badge-success"> Edit </a>
                        <form action="{{ route('category.destroy', $category->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="badge btn-danger" type="submit"> Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection