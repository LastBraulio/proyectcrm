<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>jQuery Datatables</title>
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="css/dataTables.editor.css">
    <script type="text/javascript" language="javascript" src="js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" src="js/dataTables.editor.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript">
        $(document).ready(function() {
            var datatable = $('#mytable').DataTable({
                ajax: "/Form/conexion/data.php",
                columns: [
                    {data:"id"},
                    {data:"country"},
                    {data:"iso2"},
                    {data:"iso3"},
					{data:"noc"},
                    {
                        data: null,
                        defaultContent: '<a href="#" class="edit">Edit</a> / <a href="#" class="remove">Delete</a>'
                    }
                ]
            });
        });
    </script>
</head>
<body>
    <table id="mytable" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
				<th>COUNTRY</th>
				<th>ISO2</th>
				<th>ISO3</th>
				<th>NOC</th>
				<th>CRUD</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>ID</th>
				<th>COUNTRY</th>
				<th>ISO2</th>
				<th>ISO3</th>
				<th>NOC</th>
				<th>CRUD</th>
            </tr>
        </tfoot>
    </table>
</body>
</html>