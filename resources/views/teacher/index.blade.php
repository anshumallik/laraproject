<!doctype html>
<html>
<head>
    <title>Tacher page</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

</head>
<body>
<table id="teacher" class="display" style="width:100%">
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Salary</th>
            </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Salary</th>


    </tr>
    </tfoot>
</table>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#teacher').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": "{{ route('getdata') }}",
                "dataType": "json",
                "type": "POST",
                "data":{ _token: "{{csrf_token()}}"}
            },
            "columns": [
                { "data": "name" },
                { "data": "email" },
                { "data": "salary" },
            ]

        });
    });
</script>
</html>
