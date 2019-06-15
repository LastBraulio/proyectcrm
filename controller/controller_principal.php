<?php

require_once 'model/modelo_principal.php';
require_once ("library/configuracion.php");
require_once ("library/login.php");

class Controller_principal {
	private $modelo_principal;
	private $db;
	private $log_in;
	
	function __construct(){
		
        $this->modelo_principal= new Modelo_principal();
		$this->db = new Configuracion();
		$this->log_in = new Login();
    }
	function index(){
		session_start();
		ob_start();
		include("html/header.php");
		//echo $_SESSION['count'];
		if (!isset($_SESSION['count'])){
			//header('Location: http://www.google.com.pa');
			header( "refresh:10; url=login.php" );
			die("Seccion Finalizada");
		}
		
		$menu = $this->db->configurar_menus_opciones();
		include("html/body.php");
		include("html/link.php");
		include("html/footer.php");
    }
	function ejemplo1(){
		
		$arra = array(
			"titulo"=> "Esto es Un titulo",
			"cuerpo"=>"Esto es un cuerpo....."
		);
		include("html/view_cliente/view_cliente.php");
	}
	function ajaxtabla(){
		$tabla= $this->modelo_principal->mostrar_ajax();
		echo $tabla;
	}
	public function error404()
	{
		include("html/header.php");
		include("html/error404.php");
		include("html/link.php");
		include("html/footer.php");
	}
	public function login_check()
	{
		$cedula =$_POST['cedula'];
		$pass =$_POST['pass'];
		
		$valores = $this->log_in->login_check($cedula,$pass);
		//print_r($valores); exit;
		
		session_start();
		ob_start();
		//echo session_id();
		//print_r( $_SESSION['count']) ;
		if (!isset($_SESSION['count']))
		{
			//print_r($valores); exit;
			//print_r($valores['msn']); exit;
			$_SESSION['count'] = 1;
			$_SESSION['nombre'] = $valores['names'];
			//$_SESSION['nombre'] = "Braulio Castillo";
			$_SESSION['identificador'] = $cedula;
			$_COOKIE['cedula'] = $cedula;
			//$_COOKIE['nombre'] = $valores['NombreCompleto'];
			$_COOKIE['nombre'] = $valores['names'];
		
			//echo $_COOKIE['cedula']."  ".$_COOKIE['nombre'];
			header('Content-type: application/json');
			//echo $valores;
			echo json_encode( $valores );
			//exit;
		}
		else
		{
			//$valores["valor"]="0";
			//$valores["msn"]="Ya el usuario ". $_SESSION['nombre'] ." esta dentro del sistema... ";
			header('Content-type: application/json');
			$message = [ 'msn' => 'Usuario ya dentro del sistema - verifique con el administrador estimado '. $_SESSION['nombre'], 'valor' => 0 ];
			//unset($_SESSION['count']);
			echo json_encode( $message );
		}
		
		
		//header( "refresh:10; url=principal.php?m=index" );
		 //header('location: principal.php?m=index',TRUE,307); 
		
	}
	public function login_down(){
		
		error_reporting(0);
		$_SESSION['count'] = 0;
		//unset($_SESSION['count']);
		unset($_SESSION['nombre']);
		unset($_SESSION['identificador']);
		
		session_destroy();
		
		//header('Content-type: application/json');
		//$message = [ 'msn' => 'Ha Cerrado Sección..... Espere 10 min', 'valor' => 1 ];
		//echo json_encode( $message['msn'] );
		echo "Ha Cerrado Sección..... Espere 10 min";
		
		header( "refresh:10; url=login.php" );
	}
	
}