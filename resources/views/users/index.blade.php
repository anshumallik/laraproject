@extends('layouts.layout')
@section('title','Users Page')
@section('content')
    <div class="content-wrapper">
        <h1 class="ml-5"></h1>
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>

        <a class="btn btn-danger ml-4 mb-4 mt-2" href="{{ route('export') }}">
            <i class="fas fa-file-csv"></i></a>

        <button type="button" class="btn btn-primary ml-2 mb-4 mt-2" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-file-import"></i>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import User Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <table id="example" class="table table-striped table-bordered ml-4" style="width:100%">
            <thead>
            <tr>
                <th> User Id</th>
                <th> Name</th>
                <th> Email</th>
                <th> Address</th>
                <th> Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach($users as $user)
                <tr>
                    <td> {{ $user->id }} </td>
                    <td> {{ $user->name }} </td>
                    <td> {{ $user->email}} </td>
                    <td> {{ $user->address }} </td>
                    <td>

                        <form action="{{ route('users.destroy', $user->id)}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            <button class="badge btn-danger" type="submit"> Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
        <style>
            #chartdiv {
                width: 100%;
                height: 500px;
            }

        </style>

        <!-- Resources -->
        <script src="https://www.amcharts.com/lib/4/core.js"></script>
        <script src="https://www.amcharts.com/lib/4/charts.js"></script>
        <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

        <!-- Chart code -->
        <script>
            am4core.ready(function () {

// Themes begin
                am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
                var chart = am4core.create("chartdiv", am4charts.XYChart);

// Add data
                chart.data = {!! json_encode($userChartData) !!}

                // Create axes
                var dateAxis = chart.xAxes.push(new am4charts.DateAxis());

// Create value axis
                var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
                valueAxis.min = 0;
                // valueAxis.max = 20;

// Create series
                var lineSeries = chart.series.push(new am4charts.LineSeries());
                lineSeries.dataFields.valueY = "count";
                lineSeries.dataFields.dateX = "date";
                lineSeries.name = "Sales";
                lineSeries.strokeWidth = 3;

// Add simple bullet
                var bullet = lineSeries.bullets.push(new am4charts.Bullet());
                var image = bullet.createChild(am4core.Image);
                image.href = "https://www.amcharts.com/lib/images/star.svg";
                image.width = 30;
                image.height = 30;
                image.horizontalCenter = "middle";
                image.verticalCenter = "middle";

            }); // end am4core.ready()
        </script>

        <!-- HTML -->
        <div id="chartdiv"></div>
    </div>
@endsection