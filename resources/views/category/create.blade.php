@extends('layouts.layout')
@section('content')

    <div class="content-wrapper">
        <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xl-8 p-4 m-auto shadow">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title text-info"> Add Category </h5>
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
                                        <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('first_name')}}">
                                        {!! $errors->first('name', '<small class="text-danger">:message</small>') !!}
                                    </div>



                                                                <div class="form-group">
                                <button type="submit" class="btn btn-success" name="submit"> Submit </button>
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