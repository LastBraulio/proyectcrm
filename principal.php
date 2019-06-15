<?php
//include("html/header.php");

//include("html/body.php");

//include("html/link.php");

//include("html/footer.php");
require_once('controller/controller_principal.php');
	
$controller= new Controller_principal();
    
if(!empty($_REQUEST['m'])){
    $metodo=$_REQUEST['m'];
    if (method_exists($controller, $metodo)) {
        $controller->$metodo();
    }else{
		if ($metodo == "index" or "")
		{
			$controller->index();
		}else{
			$controller->error404();
            //$controller->index();
		}
    }
}else
{
    $controller->index();
}

?>