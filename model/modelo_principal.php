<?php

require_once "conexion/conexion.php";


Class Modelo_principal extends Conexiones{
	
	
	public function mostrar_ajax()
	{
		$sentencia = "select * from countries";
		//var_dump($this->pdo);
		//exit;
		$resultado = $this->pdo->prepare($sentencia);
		$html="";
		$resultado->execute();
		/*while ($fila = $resultado->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
			$html.="<tr>";
			$html .= "<th>".$fila[0]."</th>"."<th>".$fila[1]."</th>"."<th>".$fila[2]."</th>"."<th>".$fila[3]."</th>"."<th>".$fila[4]."</th>";
			$html .="</tr>";
		}
		$this->pdo=null;
		echo $html; exit;*/
		$num = $resultado->fetchAll();

		$valor = array();
		$valor = array(
		"data"=> $num
		); 
		header('Content-type: application/json');
		echo json_encode($valor);
		//return $datos;
	}
}
/*$sentencia = "select * from countries";
$resultado = $pdo->prepare($sentencia);
$resultado->execute();
$num = $resultado->fetchAll();

$valor = array();
$valor = array(
"data"=> $num
); 
header('Content-type: application/json');
echo json_encode($valor);*/

?>