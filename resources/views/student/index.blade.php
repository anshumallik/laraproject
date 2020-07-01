@extends('layouts.layout')
@section('title','Student Page')
@section('content')
    <div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('student/create') }}" class="btn btn-info float-right"><i class="fas fa-plus-circle"></i> Add New </a>
        </div>
    </div>

        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <th> Name </th>
        <th> DOB </th>
        <th> Gender </th>
        <th> Email </th>
        <th> Phone </th>
        <th> Address </th>
        <th>Image</th>
        <th> Zipcode </th>
        <th> Action </th>
        </thead>

        <tbody>
        @foreach($students as $student)
            <tr>
                <td> {{ $student->full_name }} </td>
                <td> {{ $student->dob }} </td>
                <td> {{ $student->gender }} </td>
                <td> {{ $student->email }} </td>
                <td> {{ $student->phone }} </td>
                <td> {{ $student->address }} </td>
                <td><img src="{{asset('images/'.$student->image)}}" width="100" alt=""></td>
                <td> {{ $student->zipcode }} </td>
                {{--<td> <a href="{{ route('student.show', $student->id )}}" class="badge badge-info"> View </a>--}}
                <td>
                    <a href="{{ route('student.edit', $student->id )}}" class="badge badge-success"> Edit </a>
                    <form action="{{ route('student.destroy', $student->id)}}" method="post">
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