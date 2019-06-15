<html>

	<header>
		<title> <?php echo $arra["titulo"];  ?></title>
		
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
		<style>
			*{margin:0;}

			body{
			background:#F2F2F2;
			color:#084B8A;
			font-size:16px;
			font-family:Arial;

			}
			#contenido{
			background:#fff;
			margin:20px auto;
			overflow:hidden;
			padding:40px ;
			border:1px solid #2E9AFE;
			width:90%;
			-webkit-border-radius: 10px;
			-moz-border-radius: 10px;
			border-radius: 10px;
			}
			input, select{
			background:#fff;
			border:1px solid #2E9AFE;
			padding:5px;
			}
			header{
			background:#1C4583;
			color:#fff;
			padding:5px;
			text-align: center
			}

			footer{
			background:#1C4583;
			color:#fff;
			padding:5px;
			text-align: center

			}
			footer a{
			color:#FF8000;
			text-decoration: none;
			}
			footer a:hover{
			color:#F2F5A9;

			}
		</style>
		
	</header>

	<body>
		<?php echo $arra["cuerpo"]; echo "<br>";?>
		<table id="mytable" class="display" style="width:100%">
			<thead>
				<tr>
					<th>ID</th>
					<th>COUNTRY</th>
					<th>ISO2</th>
					<th>ISO3</th>
					<th>NOC</th>
					<th> </th>
				</tr>
			</thead>
			<tfoot >
				<tr>
					<th>ID</th>
					<th>COUNTRY</th>
					<th>ISO2</th>
					<th>ISO3</th>
					<th>NOC</th>
					<th> </th>
				</tr>
			</tfoot>
		</table>
	<!--<script src="css/vendor/jquery/jquery.min.js"></script>-->
	<script src="css/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<!--<script src="css/vendor/jquery-easing/jquery.easing.min.js"></script>-->

	<!-- Custom scripts for all pages-->
	<script src="css/js/sb-admin-2.min.js"></script>

	<!-- Page level plugins -->
	<!--<script src="css/vendor/chart.js/Chart.min.js"></script>-->

	<!-- Page level custom scripts -->
	<script src="css/js/demo/chart-area-demo.js"></script>
	<script src="css/js/demo/chart-pie-demo.js"></script>
	
	
	</body>
	

</html>