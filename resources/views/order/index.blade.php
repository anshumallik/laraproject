@extends('layouts.layout')
@section('title','Order Page')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>

        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th> Order Id</th>
                <th> User</th>
                <th> Product</th>
                <th> Total Price</th>
                <th> Order Date</th>
                <th> Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td> {{ $order->id }} </td>
                    <td> {{ $order->user['name'] }} </td>
                    <td>
                        @foreach ($order->order_items as $order_item)
                            <li>{{$order_item->product['name']}}(Qty:-{{$order_item->quantity}})</li>
                        @endforeach
                    </td>
                    <td> {{ $order->total_price}} </td>
                    <td> {{ $order->created_at }} </td>
                    <td>
                        <form action="{{ route('order.destroy', $order->id)}}" method="post">
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
                chart.data ={!! json_encode($orderChartData) !!}



                // Create axes
                var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
                dateAxis.renderer.minGridDistance = 50;

                var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

// Create series
                var series = chart.series.push(new am4charts.LineSeries());
                series.dataFields.valueY = "price";
                series.dataFields.dateX = "date";
                series.strokeWidth = 2;
                series.minBulletDistance = 10;
                series.tooltipText = "[bold]{date.formatDate()}:[/] {prod_name}:{price}\n[bold]{date.formatDate()}:[/] {qty}";
                series.tooltip.pointerOrientation = "vertical";

// Create series
                var series2 = chart.series.push(new am4charts.LineSeries());
                series2.dataFields.valueY = "qty";
                series2.dataFields.dateX = "date";
                series2.strokeWidth = 2;
                series2.minBulletDistance = 10;
                series2.strokeDasharray = "3,4";
                series2.stroke = series.stroke;

// Add cursor
                chart.cursor = new am4charts.XYCursor();
                chart.cursor.xAxis = dateAxis;

            });
        </script>
        <div id="chartdiv"></div>

    </div>
@endsection