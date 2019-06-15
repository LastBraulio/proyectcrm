<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>MY CRM - Login Usuario</title>


    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	<!-- JS -->
	
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="css/bootstrap-notify.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
	<link rel="stylesheet" href="css/signin.css">
  </head>
  <body class="text-center">
	
    <div class="form-signin">
	  <img class="mb-4" src="css/CRM.svg" alt="" width="72" height="72">
	  <h1 class="h3 mb-3 font-weight-normal">Ingrese Datos</h1>
	  <label for="inputEmail" class="sr-only">Cédula</label>
	  <input id="inputEmail" class="form-control" placeholder="Ingrese la Cedula" required autofocus>
	  <label for="inputPassword" class="sr-only">Password</label>
	  <input type="password" id="inputPassword" class="form-control" placeholder="Ingrese Password" required>
	  <div class="checkbox mb-3">
		<label>
		  <input type="checkbox" value="remember-me"> Remember me
		</label>
	  </div>
	  <button id="btm-user"class="btn btn-lg btn-primary btn-block">Sign in</button>
	  <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
	</div>
	<script>
	$(document).ready(function(){
	  $("#btm-user" ).click(function(){
		  //alert($("#inputEmail").val());
		  //alert($("#inputPassword").val());
		 $('.alert').alert('close');
		  $.ajax({
				  url:"principal.php?m=login_check",
				  type: "POST",
				  data: {
					cedula: $("#inputEmail").val(),
					pass: $("#inputPassword").val()
				  }
			})
			.done(function( data, xhr ) {
				if (data["valor"] > 0){
					//alert("acceso accesible");
					$.notify(data["msn"], {
						newest_on_top: true,
						type: 'success',
						animate: {
							enter: 'animated zoomInDown',
							exit: 'animated zoomOutUp'
						}
					});
					window.location.href = "principal.php?m=index"; 
				}else{
					$.notify("Ocurrio algo! "+data["msn"], {
						newest_on_top: true,
						type: 'warning',
						animate: {
							enter: 'animated zoomInDown',
							exit: 'animated zoomOutUp'
						}
					});
				}
			})
			.fail(function(jqXHR, textStatus, errorThrown) {
				$.notify("Error Ocurrido++++ status: "+jqXHR+" errorThrown = "+errorThrown+"", {
						newest_on_top: true,
						type: 'danger',
						animate: {
							enter: 'animated zoomInDown',
							exit: 'animated zoomOutUp'
						}
					});
			})
			.always(function(data) {
				//alert( "complete" );
			});
		});
	});
</script>
</body>

</html>