<?php

require_once ("model/modelo_cliente.php");
//require_once ($_SERVER['DOCUMENT_ROOT']."/Form/model/modelo_cliente.php");


$modelo_cliente= new Modelo_cliente();

$data = array(
			"country"=>$_POST['InputCountrycss'],
			"iso2"=>$_POST['InputISO2css'],
			"iso3"=>$_POST['InputISO3css'],
			"noc"=>$_POST['InputNOCcss']
		);
		print_r($data);
$msn= $modelo_cliente->insert($data);
echo $msn;

?>