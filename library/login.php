<?php

require_once "conexion/conexion.php";


Class Login extends Conexiones
{

	public function login_check($cedula,$pass)
	{
		$sentencia = "SELECT nombre FROM usuarios where cedula='$cedula' and pass='$pass'";
		
		/*while ($fila = $resultado->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
			$datos = $fila[0];
		}
		return $datos;*/
		try{
			$resultado = $this->pdo->prepare($sentencia);
			$resultado->execute();
			
			while ($fila = $resultado->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
				$datos = $fila[0];
			}
			
			
			//header('Content-type: application/json');
			$message = [ 'msn' => 'Bienvenido '.$datos." Espere 5 Min Por Favor", 'valor' => 1 ,'names' => $datos ];
			//$message = [ 'msn' => 'Bienvenido '.$datos." a MI CRM ", 'valor' => 1 ];
			return $message;
			//return json_encode( $message );
		}
		catch (Exception $e){
			echo $e; echo "<br>";
			$this->pdo->rollback();
			//throw $e;
			//header('Content-type: application/json');
			$message = [ 'msn' => 'Error RollBack => '.$e, 'valor' => 0 ];
			return $message;
			//return json_encode( $message );
		}
		
	}

	public function insertTablelogin( $username, $password, $email, $address )
	{
		 $stmt = $pdo->prepare("INSERT INTO `tbl_login`(`username`,`password`,`email`,`address`)
				  VALUES('$username','$password','$email','$address')");
		 $stmt->bindParam(":username",$username,":password",$password,":email",$email,":address",$address, POD::PARAM_STR);
		 $query=$stmt->execute();
	}

	public function selectforgdv() 
	{
		 $stmt = $pdo->prepare( "SELECT * FROM `tbl_login`");
		 $stmt->bindParam(":userId",$userId,":username",$username,":password",$password,":email",$email,":address",$address ,PDO::PARAM_STR);
		 $stmt->execute();
		 echo "<pre>";
		 print_r($stmt->fetchAll());
		 echo "</pre>";

	}

	public function selectforuser( $userId ) 
	{
		$stmt = $pdo->prepare("SELECT  * FROM `tbl_login` WHERE userId  = '$userId'");
		$stmt->bindParam(':userId',$userId,PDO::PARAM_INT);
		$stmt->execute();
		echo "<pre>";
		print_r($stmt->fetchAll());
		echo "</pre>";
	}

	public function updatetablelogin($userId,$username_save,$password_save,$email_save,$address_save) {
		$stmt = $pdo->prepare("UPDATE `tbl_login` SET username ='$username_save', password ='$password_save',
				   email ='$email_save',address ='$address_save' WHERE userId = '$userId'");
		$smmt->execute();
		echo  $stmt->rowCount();

	}

	public function deletetablelogin($userId) 
	{
		$stmt = $pdo->prepare("DELETE FROM `tbl_login` WHERE userId = '$userId'");
		$stmt->bindParam(':userId',$userId,PDO::PARAM_INT);
		$stmt->execute();
		echo $stmt->rowCount();
	}
 }

?>